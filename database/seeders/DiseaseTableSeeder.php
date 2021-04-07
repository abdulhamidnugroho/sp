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
        \DB::table('diseases')->insert([
            [
                'code'          => 'P01',
                'name'          => 'Damping Off (Rebah Kecambah)',
                'description'   => 'Damping Off (Rebah Kecambah) adalah suatu penyakit yang menyerang benih dan kecambah di persemaian. Penyakit ini biasanya disebabkan oleh satu atau kombinasi daeri dua atauu lebih spesies jamur air. Jamur penyebab penyakit ini antara lain Rhizoctonia solani, Rhizoctonia solani spp., Pythium spp., Fusarium spp,  Phytophthora sp.'
            ],
            [
                'code'          => 'P02',
                'name'          => 'Colletotrichum (Antaraknosa)',
                'description'   => 'Penyakit antaraknosa disebabkan oleh jamur colletotrichum spp. Jamur ini berkembang pesat pada lingkungan yang lembab dan basah.Kondisi ini tentu lebih banyak ditemui pada saat musim hujan berlangsung.'
            ],
            [
                'code'          => 'P03',
                'name'          => 'Cercospora Capsici (Bercak Daun Serkospora)',
                'description'   => 'Penyakit Cercospora Capsici (Bercak daun serkospora) atau mata katak disebabkan oleh jamur cercospora capsici berkembang biak dengan cepat apabila suatu areal pertanaman memiliki kelembapan yang tinggi dan pola tanaman yang rapat'
            ],
            [
                'code'          => 'P04',
                'name'          => 'Busuk Daun Phytophtora (Busuk Daun Fitoftora)',
                'description'   => 'Penyakit ini disebabkan oleh Phytopthora capsici.Jamur ini bisa menyerang seluruh bagian tanaman mulai dari akar, batang, daun hingga buah cabai'
            ],
        ]);
    }
}
