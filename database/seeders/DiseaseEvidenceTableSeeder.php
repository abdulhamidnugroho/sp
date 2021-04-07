<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DiseaseEvidenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('disease_evidences')->insert([
            [
                'disease_id'    => 1,
                'evidence_id'   => 1,
                'cf_rule'       => 0.2
            ],
            [
                'disease_id'    => 1,
                'evidence_id'   => 2,
                'cf_rule'       => 0.4
            ],
            [
                'disease_id'    => 1,
                'evidence_id'   => 3,
                'cf_rule'       => 0.2
            ],
            [
                'disease_id'    => 1,
                'evidence_id'   => 4,
                'cf_rule'       => 0.8
            ],
            [
                'disease_id'    => 2,
                'evidence_id'   => 5,
                'cf_rule'       => 0.2
            ],
            [
                'disease_id'    => 2,
                'evidence_id'   => 6,
                'cf_rule'       => 0.6
            ],
            [
                'disease_id'    => 2,
                'evidence_id'   => 7,
                'cf_rule'       => 0.2
            ],
            [
                'disease_id'    => 2,
                'evidence_id'   => 8,
                'cf_rule'       => 0.6
            ],
            [
                'disease_id'    => 3,
                'evidence_id'   => 9,
                'cf_rule'       => 0.4
            ],
            [
                'disease_id'    => 3,
                'evidence_id'   => 10,
                'cf_rule'       => 0.8
            ],
            [
                'disease_id'    => 3,
                'evidence_id'   => 11,
                'cf_rule'       => 0.4
            ],
            [
                'disease_id'    => 3,
                'evidence_id'   => 12,
                'cf_rule'       => 0.2
            ],
            [
                'disease_id'    => 4,
                'evidence_id'   => 13,
                'cf_rule'       => 0.4
            ],
            [
                'disease_id'    => 4,
                'evidence_id'   => 14,
                'cf_rule'       => 0.8
            ],
            [
                'disease_id'    => 4,
                'evidence_id'   => 4,
                'cf_rule'       => 1
            ],
            [
                'disease_id'    => 4,
                'evidence_id'   => 7,
                'cf_rule'       => 0.6
            ],
        ]);
    }
}
