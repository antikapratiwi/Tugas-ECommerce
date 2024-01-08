<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
<<<<<<< Updated upstream
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
=======
        $this->call([
            UnitSeeder::class,
            PeriodeSeeder::class,
            StandarSeeder::class
        ]);
>>>>>>> Stashed changes
=======
        DB::statement('SET foreign_key_checks = 0');

        echo 'Truncating all tables ...'.PHP_EOL;
        $tables = DB::select('SHOW FULL TABLES WHERE table_type = ?', ['BASE TABLE']);
        foreach ($tables as $i => $table) {
            $name = array_values((array)$table)[0];
            DB::table($name)->truncate();
            echo 'Truncating ('.($i + 1).'/'.count($tables).'): '.$name.PHP_EOL;
        }
        echo 'Done'.PHP_EOL;

        DB::statement('SET foreign_key_checks = 1');

        $this->call([
            InstanceSeeder::class,
            AuditSeeder::class,
            OutputSeeder::class
        ]);
>>>>>>> 44ab182f6ec7e99cb1ab30b9b217da901dd05115
    }
}
