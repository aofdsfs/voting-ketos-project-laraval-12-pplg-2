<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidateSeeder extends Seeder
{
    public function run(): void
    {
        Candidate::create([
            'name' => 'Dimas Prakoso',
            'visi' => 'Membentuk OSIS yang berintegritas, berprestasi, dan peduli pada setiap siswa.',
            'misi' => '1. Meningkatkan kegiatan akademik dan non-akademik siswa. 
                       2. Menjadi wadah aspirasi dan solusi nyata bagi siswa. 
                       3. Membangun budaya disiplin dan kerja sama di sekolah.',
            'photo' => 'kandidat1.jpg',
            'password' => 'admin1',
        ]);

        Candidate::create([
            'name' => 'Arya Saputra',
            'visi' => 'Menjadikan OSIS sebagai teladan kepemimpinan yang jujur, adil, dan visioner.',
            'misi' => '1. Mendorong siswa aktif dalam kegiatan sosial dan sekolah. 
                       2. Meningkatkan solidaritas antar siswa melalui program kolaboratif. 
                       3. Membangun sistem komunikasi efektif antara OSIS, guru, dan siswa.',
            'photo' => 'kandidat2.jpg',
            'password' => 'admin2',
        ]);

        Candidate::create([
            'name' => 'Rizky Ananda',
            'visi' => 'Membawa OSIS menjadi organisasi yang inovatif, transparan, dan berpihak kepada siswa.',
            'misi' => '1. Mengadakan forum rutin untuk menampung ide dan kritik siswa. 
                       2. Mengoptimalkan kegiatan positif yang mendukung bakat dan minat. 
                       3. Menjalankan setiap program OSIS dengan transparansi dan tanggung jawab.',
            'photo' => 'kandidat3.jpg',
            'password' => 'admin3',
        ]);
    }
}
