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
use App\Models\PutusanAudit;

use App\Models\FileUpload;
use App\Models\FileUploadLanjutan;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = Unit::all();
        foreach ($units as $i => $unit) {
            $k = $i % 3;
            if ($k == 0) {
                $this->createUnitAudit($unit, true, true);
            } elseif ($k == 1) {
                $this->createUnitAudit($unit, true, false);
            } elseif ($k == 2) {
                $this->createUnitAudit($unit, false, false);
            }
        }
    }

    public function createUnitAudit($unit, $done, $comply)
    {
        $periodes = [];
        if ($done) {
            $periodes = Periode::whereRaw('tgl_selesai < CURRENT_DATE')->pluck('id');
        } else {
            $periodes = Periode::whereRaw('tgl_selesai >= CURRENT_DATE')->pluck('id');
        }

        $unitAudit = UnitAudit::create([
            'id_periode' => fake()->randomElement($periodes),
            'id_unit' => $unit->id,
            'id_standar' => fake()->randomElement(Standar::pluck('id')),
            'deskripsi' => fake()->sentence(),
            'status' => $done ? 'selesai' : 'belum selesai'
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
                foreach ($klausul->sub_klausuls as $i => $subKlausul) {
                    $subKlausulAudit = SubKlausulAudit::create([
                        'id_klausul_audit' => $klausulAudit->id,
                        'slug' => $subKlausul->slug,
                        'nama' => $subKlausul->nama,
                        'deskripsi' => $subKlausul->deskripsi,
                        'file_pedoman' => $subKlausul->file_pedoman,
                        'instruksi_file_upload' => $subKlausul->instruksi_file_upload,
                        'format_file_upload' => $subKlausul->format_file_upload
                    ]);

                    if (!$comply) {
                        if ($done) {
                            $this->createAnalisa($subKlausulAudit, $unitAudit, $i < count($klausul->sub_klausuls) / 2, $done);
                        } else {
                            $this->createAnalisa($subKlausulAudit, $unitAudit, fake()->boolean(), $done);
                        }
                    } else {
                        $this->createAnalisa($subKlausulAudit, $unitAudit, true, $done);

                        $this->createFileUpload($subKlausulAudit->id);
                    }
                }
            }
        }

        if ($done) {
            $this->createPutusanAudit($unitAudit, $comply);
        }

        return $unitAudit;
    }

    public function createTimAuditor($unitAudit, $auditor, $jabatan)
    {
        return TimAuditor::create([
            'id_unit_audit' => $unitAudit->id,
            'id_auditor' => $auditor->id,
            'jabatan' => $jabatan
        ]);
    }

    public function createAnalisa($subKlausulAudit, $unitAudit, $comply, $done)
    {
        $analisa = Analisa::create([
            'id_sub_klausul_audit' => $subKlausulAudit->id,
            'deskripsi' => fake()->sentence(),
            'kondisi_awal' => fake()->sentence(),
            'dasar_evaluasi' => fake()->sentence(),
            'mematuhi_standar' => $comply
        ]);

        if (!$analisa->mematuhi_standar) {
            $this->createTemuan($analisa, $unitAudit, $comply, $done);
        }

        return $analisa;
    }

    public function createTemuan($analisa, $unitAudit, $comply, $done)
    {
        $temuan = Temuan::create([
            'id_analisa' => $analisa->id,
            'jenis' => fake()->randomElement(['major', 'minor']),
            'penyebab' => fake()->sentence(),
            'akibat' => fake()->sentence(),
            'rekomendasi_tindak_lanjut' => fake()->sentence()
        ]);

        $this->createResponTemuan($temuan, $analisa, $unitAudit, $comply, $done);

        return $temuan;
    }

    public function createResponTemuan($temuan, $analisa, $unitAudit, $comply, $done)
    {
        $responTemuan = ResponTemuan::create([
            'id_temuan' => $temuan->id,
            'feedback' => fake()->paragraph(),
            'rencana_tindak_lanjut' => implode('|', fake()->sentences(3)),
            'tgl_kesanggupan' => fake()->dateTimeBetween($unitAudit->tgl_mulai, $unitAudit->tgl_selesai)
        ]);

        $this->createAnalisaLanjutan($responTemuan, $analisa);

        if($done)
        {
            $this->createFileUploadLanjutan($responTemuan->id);
        }

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

    public function createPutusanAudit($unitAudit, $comply)
    {
        $tglRilis = (new Carbon($unitAudit->periode->tgl_selesai))->addMonth(1);
        $tglKadaluwarsa = $tglRilis->copy()->addYear(5);

        return PutusanAudit::create([
            'id_unit_audit' => $unitAudit->id,
            'mematuhi_standar' => $comply,
            'tgl_rilis' => $tglRilis,
            'tgl_kadaluwarsa' => $tglKadaluwarsa,
            'keterangan' => fake()->paragraph()
        ]);
    }


    public function createFileUpload($id_sub_klausul_audit)
    {
        $fileUpload = FileUpload::create([
            'id_sub_klausul_audit' => $id_sub_klausul_audit,
            'file' => 'file_upload.pdf',
            'keterangan' => fake()->sentence()
        ]);

        return $fileUpload;
    }

    public function createFileUploadLanjutan($id_respon_temuan)
    {
        $fileUploadLanjutan = FileUploadLanjutan::create([
            'id_respon_temuan' => $id_respon_temuan,
            'file' => 'file_upload_lanjutan.pdf',
            'keterangan' => fake()->sentence()
        ]);

        return $fileUploadLanjutan;
    }
    
}
