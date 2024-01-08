<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
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
            'alamat' => fake('id_ID')->address,
            'nama_pimpinan' => fake('id_ID')->name,
            'nip_pimpinan' => fake('id_ID')->numerify
        ];
    }
}
