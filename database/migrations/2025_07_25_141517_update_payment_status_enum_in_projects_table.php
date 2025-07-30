<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Ubah data yang ada dari 'unpaid' menjadi 'pending'
            DB::statement("UPDATE projects SET payment_status = 'pending' WHERE payment_status = 'unpaid'");
            
            // Ubah enum untuk menambahkan 'pending' dan 'overdue', menghapus 'unpaid'
            DB::statement("ALTER TABLE projects MODIFY COLUMN payment_status ENUM('pending', 'paid', 'overdue') DEFAULT 'pending'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Kembalikan data dari 'pending' ke 'unpaid'
            DB::statement("UPDATE projects SET payment_status = 'unpaid' WHERE payment_status = 'pending'");
            
            // Kembalikan enum ke nilai semula
            DB::statement("ALTER TABLE projects MODIFY COLUMN payment_status ENUM('unpaid', 'paid') DEFAULT 'unpaid'");
        });
    }
};
