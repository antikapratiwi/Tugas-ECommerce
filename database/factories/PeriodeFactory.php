<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periode>
 */
class PeriodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake('id_ID')->name,
            'tgl_mulai' => fake('id_ID')->dateTime,
            'tgl_selesai' => fake('id_ID')->dateTime,
            'no_sk' => fake('id_ID')->uuid,
            'tgl_sk' => fake('id_ID')->dateTime,
            'file_sk' => fake('id_ID')->numerify,
            'nama_ketua_spi' => fake('id_ID')->name,
            'nip_ketua_spi' => fake('id_ID')->numerify,
        ];
    }
}
