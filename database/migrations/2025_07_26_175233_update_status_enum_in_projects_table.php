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
        // First, add a temporary column
        Schema::table('projects', function (Blueprint $table) {
            $table->enum('status_new', ['planning', 'in_progress', 'completed', 'on_hold'])->default('planning')->after('status');
        });
        
        // Update data mapping old values to new values
        DB::statement("UPDATE projects SET status_new = CASE 
            WHEN status = 'planning' THEN 'planning'
            WHEN status = 'development' THEN 'in_progress'
            WHEN status = 'testing' THEN 'in_progress'
            WHEN status = 'completed' THEN 'completed'
            WHEN status = 'maintenance' THEN 'completed'
            ELSE 'planning'
        END");
        
        // Drop old column and rename new column
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('status_new', 'status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add temporary column with old enum values
        Schema::table('projects', function (Blueprint $table) {
            $table->enum('status_old', ['planning', 'development', 'testing', 'completed', 'maintenance'])->default('planning')->after('status');
        });
        
        // Map new values back to old values
        DB::statement("UPDATE projects SET status_old = CASE 
            WHEN status = 'planning' THEN 'planning'
            WHEN status = 'in_progress' THEN 'development'
            WHEN status = 'completed' THEN 'completed'
            WHEN status = 'on_hold' THEN 'testing'
            ELSE 'planning'
        END");
        
        // Drop new column and rename old column
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('status_old', 'status');
        });
    }
};
