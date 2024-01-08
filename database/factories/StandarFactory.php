<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Standar>
 */
class StandarFactory extends Factory
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
            'deskripsi' => fake('id_ID')->paragraph,
            'bidang' => fake('id_ID')->word,
            'penerbit' => fake('id_ID')->company,
            'tgl_rilis' => fake('id_ID')->date('d/m/o')
        ];
    }
}
