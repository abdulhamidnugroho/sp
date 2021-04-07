<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DiseaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diseases')->insert([
            [
                'code'       => 'P01',
                'name'       => 'Penyakit 1',
            ],
            [
                'code'       => 'P02',
                'name'       => 'Penyakit 2',
            ],
        ]);
    }
}
