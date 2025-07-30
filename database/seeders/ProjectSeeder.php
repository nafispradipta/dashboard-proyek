<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'client_id' => 1,
                'website_name' => 'Company Website',
                'url' => 'company-website.com',
                'status' => 'completed',
                'notes' => 'Website perusahaan dengan fitur company profile dan blog',
                'domain_expiry' => Carbon::now()->addYear(),
                'hosting_expiry' => Carbon::now()->addYear(),
                'price' => 15000000,
                'payment_date' => Carbon::now()->subMonth(),
                'payment_status' => 'paid',
                'package_status' => 'website_maintenance',
                'hosting_provider' => 'Virtual Server'
            ],
            [
                'client_id' => 2,
                'website_name' => 'Fintech App Landing',
                'url' => 'fintech-app.com',
                'status' => 'completed',
                'notes' => 'Landing page untuk aplikasi fintech dengan fitur showcase',
                'domain_expiry' => Carbon::now()->addMonths(8),
                'hosting_expiry' => Carbon::now()->addMonths(8),
                'price' => 12000000,
                'payment_date' => Carbon::now()->subMonths(2),
                'payment_status' => 'paid',
                'package_status' => 'website_seo',
                'hosting_provider' => 'Cloud Hosting'
            ],
            [
                'client_id' => 3,
                'website_name' => 'E-commerce Platform',
                'url' => 'ecommerce-sejahtera.com',
                'status' => 'on_hold',
                'notes' => 'Platform e-commerce dengan sistem pembayaran terintegrasi',
                'domain_expiry' => Carbon::now()->addMonths(4),
                'hosting_expiry' => Carbon::now()->addMonths(4),
                'price' => 35000000,
                'payment_date' => Carbon::now()->subMonths(1),
                'payment_status' => 'paid',
                'package_status' => 'website_maintenance_seo',
                'hosting_provider' => 'Dedicated Server'
            ],
            [
                'client_id' => 4,
                'website_name' => 'Medical Clinic Portal',
                'url' => 'kliniksehat.co.id',
                'status' => 'completed',
                'notes' => 'Portal klinik dengan sistem booking dan konsultasi online',
                'domain_expiry' => Carbon::now()->addMonths(10),
                'hosting_expiry' => Carbon::now()->addMonths(10),
                'price' => 18000000,
                'payment_date' => Carbon::now()->subMonths(3),
                'payment_status' => 'paid',
                'package_status' => 'website_maintenance',
                'hosting_provider' => 'VPS Server'
            ],
            [
                'client_id' => 5,
                'website_name' => 'Law Firm Website',
                'url' => 'firmahukumadil.com',
                'status' => 'completed',
                'notes' => 'Website firma hukum dengan portal klien dan artikel hukum',
                'domain_expiry' => Carbon::now()->addMonths(6),
                'hosting_expiry' => Carbon::now()->addMonths(6),
                'price' => 14000000,
                'payment_date' => Carbon::now()->subMonths(2),
                'payment_status' => 'paid',
                'package_status' => 'website_seo',
                'hosting_provider' => 'Shared Hosting'
            ],
            [
                'client_id' => 6,
                'website_name' => 'Restaurant Chain Website',
                'url' => 'restonusantara.id',
                'status' => 'completed',
                'notes' => 'Website restoran dengan menu online dan sistem reservasi',
                'domain_expiry' => Carbon::now()->addMonths(9),
                'hosting_expiry' => Carbon::now()->addMonths(9),
                'price' => 11000000,
                'payment_date' => Carbon::now()->subMonths(1),
                'payment_status' => 'paid',
                'package_status' => 'website_maintenance',
                'hosting_provider' => 'VPS Server'
            ],
            [
                'client_id' => 7,
                'website_name' => 'Creative Agency Portfolio',
                'url' => 'kreatifmedia.co.id',
                'status' => 'in_progress',
                'notes' => 'Portfolio website dengan showcase project dan blog kreatif',
                'domain_expiry' => Carbon::now()->addMonths(12),
                'hosting_expiry' => Carbon::now()->addMonths(12),
                'price' => 16000000,
                'payment_date' => null,
                'payment_status' => 'pending',
                'package_status' => 'website_seo',
                'hosting_provider' => 'Cloud Hosting'
            ],
            [
                'client_id' => 8,
                'website_name' => 'Logistics Management System',
                'url' => 'mandirilogistics.com',
                'status' => 'planning',
                'notes' => 'Sistem manajemen logistik dengan tracking real-time',
                'domain_expiry' => null,
                'hosting_expiry' => null,
                'price' => 45000000,
                'payment_date' => null,
                'payment_status' => 'pending',
                'package_status' => 'website_maintenance_seo',
                'hosting_provider' => 'Dedicated Server'
            ],
            [
                'client_id' => 9,
                'website_name' => 'University Portal',
                'url' => 'sttmodern.ac.id',
                'status' => 'in_progress',
                'notes' => 'Portal universitas dengan sistem akademik terintegrasi',
                'domain_expiry' => Carbon::now()->addYear(),
                'hosting_expiry' => Carbon::now()->addYear(),
                'price' => 28000000,
                'payment_date' => Carbon::now()->subWeeks(2),
                'payment_status' => 'pending',
                'package_status' => 'website_maintenance',
                'hosting_provider' => 'VPS Server'
            ],
            [
                'client_id' => 10,
                'website_name' => 'Resort Booking System',
                'url' => 'bintanglima.com',
                'status' => 'completed',
                'notes' => 'Sistem booking resort dengan virtual tour dan payment gateway',
                'domain_expiry' => Carbon::now()->addMonths(7),
                'hosting_expiry' => Carbon::now()->addMonths(7),
                'price' => 22000000,
                'payment_date' => Carbon::now()->subMonths(2),
                'payment_status' => 'paid',
                'package_status' => 'website_maintenance_seo',
                'hosting_provider' => 'Cloud Hosting'
            ],
            [
                'client_id' => 11,
                'website_name' => 'Pharmacy E-commerce',
                'url' => 'apoteksehat.co.id',
                'status' => 'on_hold',
                'notes' => 'E-commerce apotek dengan konsultasi farmasi online',
                'domain_expiry' => Carbon::now()->addMonths(5),
                'hosting_expiry' => Carbon::now()->addMonths(5),
                'price' => 19000000,
                'payment_date' => Carbon::now()->subMonths(1),
                'payment_status' => 'paid',
                'package_status' => 'website_maintenance',
                'hosting_provider' => 'VPS Server'
            ],
            [
                'client_id' => 12,
                'website_name' => 'Agribusiness Platform',
                'url' => 'agronusantara.com',
                'status' => 'planning',
                'notes' => 'Platform agribisnis dengan marketplace produk organik',
                'domain_expiry' => null,
                'hosting_expiry' => null,
                'price' => 32000000,
                'payment_date' => null,
                'payment_status' => 'pending',
                'package_status' => 'website_seo',
                'hosting_provider' => 'Cloud Hosting'
            ],
            [
                'client_id' => 13,
                'website_name' => 'Auto Service Booking',
                'url' => 'bengkeljaya.id',
                'status' => 'in_progress',
                'notes' => 'Sistem booking service motor dengan tracking progress',
                'domain_expiry' => Carbon::now()->addMonths(11),
                'hosting_expiry' => Carbon::now()->addMonths(11),
                'price' => 13000000,
                'payment_date' => Carbon::now()->subWeeks(3),
                'payment_status' => 'pending',
                'package_status' => 'website',
                'hosting_provider' => 'Shared Hosting'
            ],
            [
                'client_id' => 14,
                'website_name' => 'Financial Consultant Portal',
                'url' => 'keuanganprima.com',
                'status' => 'completed',
                'notes' => 'Portal konsultan keuangan dengan kalkulator investasi',
                'domain_expiry' => Carbon::now()->addMonths(8),
                'hosting_expiry' => Carbon::now()->addMonths(8),
                'price' => 17000000,
                'payment_date' => Carbon::now()->subMonths(2),
                'payment_status' => 'paid',
                'package_status' => 'website_seo',
                'hosting_provider' => 'VPS Server'
            ],
            [
                'client_id' => 15,
                'website_name' => 'Kindergarten Management',
                'url' => 'tkcerdas.sch.id',
                'status' => 'on_hold',
                'notes' => 'Sistem manajemen TK dengan portal orang tua dan guru',
                'domain_expiry' => Carbon::now()->addMonths(6),
                'hosting_expiry' => Carbon::now()->addMonths(6),
                'price' => 9500000,
                'payment_date' => Carbon::now()->subMonths(1),
                'payment_status' => 'paid',
                'package_status' => 'website_maintenance',
                'hosting_provider' => 'Shared Hosting'
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}