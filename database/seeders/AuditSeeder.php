<?php

namespace Database\Seeders;

use App\Models\Periode;
use App\Models\Standar;
use App\Models\Unit;
use App\Models\User;
use App\Models\TimAuditor;
use App\Models\UnitAudit;
use App\Models\KlausulAudit;
use App\Models\SubKlausulAudit;
use App\Models\Analisa;
use App\Models\Temuan;
use App\Models\ResponTemuan;
use App\Models\AnalisaLanjutan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = Unit::all();
        foreach ($units as $unit) {
            $this->createUnitAudit($unit);
        }
    }

    public function createUnitAudit($unit)
    {
        $unitAudit = UnitAudit::create([
            'id_periode' => fake()->randomElement(Periode::pluck('id')),
            'id_unit' => $unit->id,
            'id_standar' => fake()->randomElement(Standar::pluck('id')),
            'deskripsi' => fake()->sentence(),
            'status' => 'belum selesai'
        ]);

        $auditors = User::where('tipe', 'auditor')->get();
        foreach ($auditors as $i => $auditor) {
            $this->createTimAuditor($unitAudit, $auditor, $i == 0 ? 'ketua' : 'anggota');
        }

        $standar = $unitAudit->standar;
        foreach ($standar->klausuls as $klausul) {
            $klausulAudit = KlausulAudit::create([
                'id_unit_audit' => $unitAudit->id,
                'nama' => $klausul->nama,
                'deskripsi' => $klausul->deskripsi,
                'persyaratan' => $klausul->persyaratan
            ]);

            if ($klausul->persyaratan) {
                foreach ($klausul->sub_klausuls as $subKlausul) {
                    $subKlausulAudit = SubKlausulAudit::create([
                        'id_klausul_audit' => $klausulAudit->id,
                        'slug' => $subKlausul->slug,
                        'nama' => $subKlausul->nama,
                        'deskripsi' => $subKlausul->deskripsi,
                        'file_pedoman' => $subKlausul->file_pedoman,
                        'instruksi_file_upload' => $subKlausul->instruksi_file_upload,
                        'format_file_upload' => $subKlausul->format_file_upload
                    ]);

                    $this->createAnalisa($subKlausulAudit, $unitAudit);
                }
            }
        }
    }

    public function createTimAuditor($unitAudit, $auditor, $jabatan)
    {
        return TimAuditor::create([
            'id_unit_audit' => $unitAudit->id,
            'id_auditor' => $auditor->id,
            'jabatan' => $jabatan
        ]);
    }

    public function createAnalisa($subKlausulAudit, $unitAudit)
    {
        $analisa = Analisa::create([
            'id_sub_klausul_audit' => $subKlausulAudit->id,
            'deskripsi' => fake()->sentence(),
            'kondisi_awal' => fake()->sentence(),
            'dasar_evaluasi' => fake()->sentence(),
            'mematuhi_standar' => fake()->boolean
        ]);

        if (!$analisa->mematuhi_standar) {
            $this->createTemuan($analisa, $unitAudit);
        }

        return $analisa;
    }

    public function createTemuan($analisa, $unitAudit)
    {
        $temuan = Temuan::create([
            'id_analisa' => $analisa->id,
            'jenis' => fake()->randomElement(['major', 'minor']),
            'penyebab' => implode('|', fake()->sentences(3)),
            'akibat' => implode('|', fake()->sentences(3)),
            'rekomendasi_tindak_lanjut' => implode('|', fake()->sentences(3))
        ]);

        $this->createResponTemuan($temuan, $analisa, $unitAudit);

        return $temuan;
    }

    public function createResponTemuan($temuan, $analisa, $unitAudit)
    {
        $responTemuan = ResponTemuan::create([
            'id_temuan' => $temuan->id,
            'feedback' => fake()->paragraph(),
            'rencana_tindak_lanjut' => implode('|', fake()->sentences(3)),
            'tgl_kesanggupan' => fake()->dateTimeBetween($unitAudit->tgl_mulai, $unitAudit->tgl_selesai)
        ]);

        $this->createAnalisaLanjutan($responTemuan, $analisa);

        return $responTemuan;
    }

    public function createAnalisaLanjutan($responTemuan, $analisa)
    {
        return AnalisaLanjutan::create([
            'id_respon_temuan' => $responTemuan->id,
            'mematuhi_standar' => fake()->boolean(),
            'keterangan' => fake()->sentence(),
            'id_analisa_cache' => $analisa->id
        ]);
    }
}
