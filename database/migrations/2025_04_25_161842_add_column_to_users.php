<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'level')) {
                $table->string('level', 100)->nullable();
            }
            if (!Schema::hasColumn('users', 'active')) {
                $table->enum('active', ['1', '0'])->default('1');
            }
            if (!Schema::hasColumn('users', 'language')) {
                $table->string('language', 5)->nullable();
            }
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
