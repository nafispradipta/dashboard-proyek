<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('website_name');
            $table->string('url')->nullable();
            $table->enum('status', ['planning', 'development', 'testing', 'completed', 'maintenance'])->default('planning');
            $table->text('notes')->nullable();
            $table->date('domain_expiry')->nullable();
            $table->date('hosting_expiry')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->date('payment_date')->nullable();
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
