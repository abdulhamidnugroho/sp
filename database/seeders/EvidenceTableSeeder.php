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
        \DB::table('evidences')->insert([
            [
                'name'          => 'Semaian cabai  gagal tumbuh',
            ],
            [
                'name'          => 'Biji yang sudah berkecambah matti tiba-tiba',
            ],
            [
                'name'          => 'Semaian kerdil',
            ],
            [
                'name'          => 'Semaian cabai sporadis (menyebar tidak beraturan)',
            ],
            [
                'name'          => 'Mati pucuk',
            ],
            [
                'name'          => 'Daun,ranting dan cabang busuk kering berwarna coklat kehitam hitaman',
            ],
            [
                'name'          => 'Buah timbul bercak lunak berwarna hitam dan busuk lunak',
            ],
            [
                'name'          => 'Pada batang acervuli cendawan terlihatr berupa penjolan',
            ],
            [
                'name'          => 'Bercak bulat sirkuler berwarna abu abu tua dan warna coklat di pinggirnya',
            ],
            [
                'name'          => 'Daun menjadi tua (menguning) sebelum waktunya',
            ],
            [
                'name'          => 'Bercak daun berukuran sekitar 0,25 cm',
            ],
            [
                'name'          => 'Sering terjadi sobekan dipusat daun',
            ],
            [
                'name'          => 'Leher batang busuk berwarna hijau setelah setelah kering warna menjadi coklat/hitam',
            ],
            [
                'name'          => 'Kelayuan yang serentak dan tiba tiba dari bagian tanaman lainya',
            ],
        ]);
    }
}
