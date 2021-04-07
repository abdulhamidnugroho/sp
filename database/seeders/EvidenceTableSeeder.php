<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EvidenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evidences')->insert([
            [
                'code'       => 'GP01',
                'name'       => 'Gejala Penyakit 1',
                'cf_rule'   => 0.2
            ],
            [
                'code'       => 'GP01',
                'name'       => 'Gejala Penyakit 1',
                'cf_rule'   => 0.4
            ],
            [
                'code'       => 'GP02',
                'name'       => 'Gejala Penyakit 2',
                'cf_rule'   => 0.6
            ],
            [
                'code'       => 'GP02',
                'name'       => 'Gejala Penyakit 2',
                'cf_rule'   => 0.1
            ],
        ]);
    }
}
