<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tempat_magangs', function (Blueprint $table) {
            $table->string('deskripsi_pekerjaan')->nullable();
            $table->string('kriteria')->nullable();
            $table->string('deskripsi_perusahaan')->nullable();
            $table->string('website')->nullable();
            $table->integer('employee_size')->nullable();
            $table->string('head_office')->nullable();
            $table->integer('since')->nullable();
            $table->string('specialization')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tempat_magangs', function (Blueprint $table) {
            //
        });
    }
};
