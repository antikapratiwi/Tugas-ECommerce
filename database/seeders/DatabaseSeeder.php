<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Standar;
use App\Models\Klausul;
use App\Models\SubKlausul;
use App\Models\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'nama' => 'admin',
            'nip' => '123123123',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12345'),
            'tipe' => 'admin',
        ]);

        $this->CreateStandar();
        $this->CreateUnit();
    }

    private function CreateUnit()
    {
        Unit::create([
            'id' => 1,
            'nama' => 'Bank Central Asia',
            'alamat' => 'Jakarta Pusat',
            'nama_pimpinan' => 'Dr. Ir. Sutanto',
            'nip_pimpinan' => '082931028'
        ]);
        Unit::create([
            'id' => 2,
            'nama' => 'Freeport',
            'alamat' => 'Jayapura',
            'nama_pimpinan' => 'John Doe',
            'nip_pimpinan' => '12412452145'
        ]);
        Unit::create([
            'id' => 3,
            'nama' => 'Mixue',
            'alamat' => 'Bandung',
            'nama_pimpinan' => 'James Bond',
            'nip_pimpinan' => '242521521'
        ]);
    }

    private function CreateStandar()
    {

        Standar::create([
            'id' => 1,
            'nama' => 'ISO 37001',
            'deskripsi' => 'lorem ipsum',
            'bidang' => 'lorem ipsum',
            'penerbit' => 'lorem ipsum',
            'tgl_rilis' => '2023-05-05',
        ]);

        Klausul::insert(
            [
                'id' => 1,
                'id_standar' => 1,
                'nama' => 'Tujuan',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => false,
            ],
            [
                'id' => 2,
                'id_standar' => 1,
                'nama' => 'Standar Referensi',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => false,
            ],
            [
                'id' => 3,
                'id_standar' => 1,
                'nama' => 'Istilah Definisi',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => false,
            ],
            [
                'id' => 4,
                'id_standar' => 1,
                'nama' => 'Konteks Organisasi',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => true,
            ],
            [
                'id' => 5,
                'id_standar' => 1,
                'nama' => 'Kepemimpinan',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => true,
            ],
            [
                'id' => 6,
                'id_standar' => 1,
                'nama' => 'Perencanaan',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => true,
            ],
            [
                'id' => 7,
                'id_standar' => 1,
                'nama' => 'Dukungan',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => true,
            ],
            [
                'id' => 8,
                'id_standar' => 1,
                'nama' => 'Aktivasi Operasi',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => true,
            ],
            [
                'id' => 9,
                'id_standar' => 1,
                'nama' => 'Evaluasi Kerja',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => true,
            ],
            [
                'id' => 10,
                'id_standar' => 1,
                'nama' => 'Perbaikan',
                'deskripsi' => 'lorem ipsum',
                'persyaratan' => true,
            ]
        );

        // SubKlausul::insert()
    }
}
