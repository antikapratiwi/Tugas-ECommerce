<?php

namespace Database\Seeders;

use App\Models\Standar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StandarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Standar::factory(50)->create();
    }
}
