<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SolutionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('solutions')->insert([
            [
                'disease_id'    => 1,
                'solution'      => '.Media untuk penyemaian menggunakan lapisan sub soil(1,5-2m dibawah permukaan tanah) dan pupuk kandang matang yang halus dan pasir kali pada perbandingan 1: 1:1.'
            ],
            [
                'disease_id'    => 1,
                'solution'      => 'Semaian yang terinfeksi penyakit harus dicabut dan dimusnahkan, media tanah yang terkontaminasi dibuang.'
            ],
            [
                'disease_id'    => 2,
                'solution'      => 'Pemupukan yang berimbang , yaitu urea 150-200 kg, ZA 450-500 kg, TSP 100-150 kg, KCI 100-150 kg, dan pupuk organik20-30 ton per hektar'
            ],
            [
                'disease_id'    => 2,
                'solution'      => 'Dikendalikan dengan fungisida klorotalonil (Daconil , 500 F,2g/l) atau propinep (antracol, 70 WP,2g/l0.kedua fungisida ini digunakan secara bergantian'
            ],
            [
                'disease_id'    => 3,
                'solution'      => 'Dikendalikan dengan fungisida difenoconazole (score 250 EC dengan konsentrasi 0,5 ml/l) interval penyemprotan 7 hari'
            ],
            [
                'disease_id'    => 3,
                'solution'      => 'Intercropping antara cabai dan tomat didataran tinggi dapat mengurangi serangan hama dan penyakit serta menaikan hasil panen. Intercropping adalah tehnik budi daya yang membudidayakan lebih dari satu tanaman pada satu lahan  yang sama pada periode tanam yang sama'
            ],
            [
                'disease_id'    => 4,
                'solution'      => 'Tanaman muda yang terinfeksi penyakit dilapangan dimusnahkan dan disulam dengan yang sehat'
            ],
            [
                'disease_id'    => 4,
                'solution'      => 'dikendalikan dengan fungisida sistemik Metalaksil-M 4% + Mancozeb 64% (Ridomil Gold MZ 4/64 WP) pada konsentrasi 3 g/l air, bergantian dengan fungiisida kontak seperti klorotalonil (Daconil 500 F, 2g/l) Fungisida sistemik digunakan maksimal empat kali permusim'
            ],
        ]);
    }
}
