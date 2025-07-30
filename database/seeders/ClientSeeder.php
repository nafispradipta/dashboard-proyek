<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'PT. Technology Solutions',
                'phone' => '021-5551234',
                'email' => 'contact@techsolutions.com',
                'address' => 'Jl. Sudirman No. 123, Jakarta Pusat',
                'notes' => 'Perusahaan teknologi yang fokus pada solusi enterprise',
            ],
            [
                'name' => 'Startup Inovasi Digital',
                'phone' => '0812-3456-7890',
                'email' => 'hello@startupinovasi.id',
                'address' => 'Jl. Gatot Subroto No. 45, Jakarta Selatan',
                'notes' => 'Startup yang sedang berkembang di bidang fintech',
            ],
            [
                'name' => 'Toko Online Sejahtera',
                'phone' => '0877-8899-0011',
                'email' => 'admin@tokoonlinesejahtera.com',
                'address' => 'Jl. Raya Bogor Km. 30, Bogor',
                'notes' => 'Toko online yang menjual berbagai produk fashion dan elektronik',
            ],
            [
                'name' => 'Klinik Sehat Mandiri',
                'phone' => '021-7778899',
                'email' => 'info@kliniksehat.co.id',
                'address' => 'Jl. Pahlawan No. 55, Bandung',
                'notes' => 'Klinik kesehatan dengan layanan dokter umum dan spesialis',
            ],
            [
                'name' => 'Firma Hukum Adil & Partners',
                'phone' => '021-3334455',
                'email' => 'legal@firmahukumadil.com',
                'address' => 'Jl. MH Thamrin No. 10, Jakarta Pusat',
                'notes' => 'Firma hukum yang menangani kasus bisnis dan perdata',
            ],
            [
                'name' => 'Restoran Nusantara Heritage',
                'phone' => '0856-7788-9900',
                'email' => 'info@restonusantara.id',
                'address' => 'Jl. Diponegoro No. 78, Surabaya',
                'notes' => 'Restoran yang menyajikan berbagai masakan nusantara',
            ],
            [
                'name' => 'CV. Kreatif Media Indonesia',
                'phone' => '022-8765432',
                'email' => 'creative@kreatifmedia.co.id',
                'address' => 'Jl. Asia Afrika No. 88, Bandung',
                'notes' => 'Agensi kreatif yang bergerak di bidang digital marketing dan branding',
            ],
            [
                'name' => 'PT. Mandiri Logistics',
                'phone' => '031-5566778',
                'email' => 'ops@mandirilogistics.com',
                'address' => 'Jl. Raya Juanda No. 156, Surabaya',
                'notes' => 'Perusahaan logistik dengan jaringan distribusi nasional',
            ],
            [
                'name' => 'Sekolah Tinggi Teknologi Modern',
                'phone' => '0274-889900',
                'email' => 'admin@sttmodern.ac.id',
                'address' => 'Jl. Kaliurang Km. 14, Yogyakarta',
                'notes' => 'Institusi pendidikan tinggi dengan fokus teknologi informasi',
            ],
            [
                'name' => 'Hotel Bintang Lima Resort',
                'phone' => '0361-445566',
                'email' => 'reservation@bintanglima.com',
                'address' => 'Jl. Pantai Kuta No. 99, Bali',
                'notes' => 'Resort mewah dengan fasilitas lengkap di tepi pantai',
            ],
            [
                'name' => 'Apotek Sehat Bersama',
                'phone' => '021-9988776',
                'email' => 'info@apoteksehat.co.id',
                'address' => 'Jl. Kemang Raya No. 45, Jakarta Selatan',
                'notes' => 'Jaringan apotek dengan layanan konsultasi farmasi online',
            ],
            [
                'name' => 'PT. Agro Nusantara Sejahtera',
                'phone' => '0251-334455',
                'email' => 'contact@agronusantara.com',
                'address' => 'Jl. Pajajaran No. 67, Bogor',
                'notes' => 'Perusahaan agribisnis dengan fokus produk organik',
            ],
            [
                'name' => 'Bengkel Motor Jaya Abadi',
                'phone' => '0813-2244668',
                'email' => 'service@bengkeljaya.id',
                'address' => 'Jl. Ahmad Yani No. 123, Bekasi',
                'notes' => 'Bengkel spesialis motor dengan layanan home service',
            ],
            [
                'name' => 'Konsultan Keuangan Prima',
                'phone' => '021-6677889',
                'email' => 'konsultasi@keuanganprima.com',
                'address' => 'Jl. HR Rasuna Said No. 88, Jakarta Selatan',
                'notes' => 'Konsultan keuangan untuk perencanaan investasi dan asuransi',
            ],
            [
                'name' => 'Taman Kanak-Kanak Cerdas',
                'phone' => '021-5544332',
                'email' => 'info@tkcerdas.sch.id',
                'address' => 'Jl. Benda Raya No. 34, Jakarta Selatan',
                'notes' => 'TK dengan kurikulum internasional dan fasilitas modern',
            ]
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}