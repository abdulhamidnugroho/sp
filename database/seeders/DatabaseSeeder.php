<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DiseaseTableSeeder::class,
            EvidenceTableSeeder::class,
            SolutionTableSeeder::class,
            DiseaseEvidenceTableSeeder::class
        ]);
    }
}
