<?php

namespace Database\Seeders;

use App\Models\Periode;
use App\Models\Unit;
use App\Models\User;
use App\Models\Standar;
use App\Models\Klausul;
use App\Models\SubKlausul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class InstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($id = 1; $id <= 5; $id++) {
            if ($id == 1) {
                User::create([
                    'id' => $id,
                    'nama' => 'Administrator',
                    'nip' => fake()->numerify('################'),
                    'email' => 'admin@example.com',
                    'password' => bcrypt('password'),
                    'tipe' => 'admin'
                ]);
            } else {
                $this->createUser('auditor');
            }
        }

        $this->createPeriode(1, 1);
        $this->createPeriode(1, 2);
        $this->createPeriode(0);

        for ($i = 0; $i < 3; $i++) {
            $unit = $this->createUnit();
            for ($j = 0; $j < 2; $j++) {
                $this->createUser('auditee', ['id_unit_auditee' => $unit->id]);
            }
        }

        $standar = $this->createStandar();
        for ($i = 0; $i < 3; $i++) {
            $this->createKlausul($standar, false);
        }
        for ($i = 0; $i < 3; $i++) {
            $this->createKlausul($standar, true);
        }
    }

    public function createPeriode($deltaYear, $semester = 0)
    {
        $reference = now()->subYear($deltaYear);

        $year = $reference->year;
        if ($deltaYear == 0) {
            $semester = (floor(($reference->month - 1) / 6) + 1) % 2;
        }

        $nama = $year.'/'.($semester == 1 ? 'GANJIL' : 'GENAP');
        $tglMulai = now()->year($year)->month($semester == 1 ? 1 : 7)->startOfMonth();
        $tglSelesai = now()->year($year)->month($semester == 1 ? 6 : 12)->endOfMonth();

        return Periode::create([
            'nama' => $nama,
            'tgl_mulai' => $tglMulai,
            'tgl_selesai' => $tglSelesai,
            'no_sk' => fake()->numerify('SK-####-####'),
            'tgl_sk' => $tglMulai,
            'file_sk' => '',
            'nama_ketua_spi' => fake()->name(),
            'nip_ketua_spi' => fake()->numerify('################')
        ]);
    }

    public function createUnit()
    {
        return Unit::create([
            'nama' => fake()->company(),
            'alamat' => fake()->address(),
            'nama_pimpinan' => fake()->name(),
            'nip_pimpinan' => fake()->numerify('################')
        ]);
    }

    public function createUser($tipe, $options = [])
    {
        return User::create([
            'nama' => fake()->name(),
            'nip' => fake()->numerify('################'),
            'email' => fake()->safeEmail(),
            'password' => bcrypt('password'),
            'tipe' => $tipe,
            'id_unit_auditee' => $tipe === 'auditee' ? $options['id_unit_auditee'] : null
        ]);
    }

    public function createStandar()
    {
        return Standar::create([
            'nama' => fake()->numerify('ISO ####'),
            'deskripsi' => fake()->sentence(),
            'bidang' => fake()->jobTitle(),
            'penerbit' => fake()->company(),
            'tgl_rilis' => fake()->dateTimeBetween('-5 years', '-1 year')
        ]);
    }

    public function createKlausul($standar, $persyaratan)
    {
        $klausul = Klausul::create([
            'id_standar' => $standar->id,
            'nama' => fake()->sentence(),
            'deskripsi' => fake()->sentence(),
            'persyaratan' => $persyaratan
        ]);

        if ($persyaratan) {
            for ($i = 0; $i < 2; $i++) {
                $this->createSubKlausul($klausul);
            }
        }

        return $klausul;
    }

    public function createSubKlausul($klausul)
    {
        $nama = fake()->sentence(3);
        $slug = str_replace(' ', '-', strtolower($nama));

        return SubKlausul::create([
            'id_klausul' => $klausul->id,
            'slug' => $slug,
            'nama' => $nama,
            'deskripsi' => fake()->sentence(),
            'file_pedoman' => 'file_pedoman.pdf',
            'instruksi_file_upload' => fake()->sentence(),
            // 'format_file_upload' => fake()->randomElement(['pdf', 'image'])
            'format_file_upload' => 'pdf'
        ]);
    }
}
