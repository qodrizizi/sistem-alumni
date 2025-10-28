<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id('id_vacancy');
            $table->unsignedBigInteger('user_id');
            $table->string('perusahaan', 150);
            $table->string('posisi', 100);
            $table->string('lokasi', 255)->nullable();
            $table->string('gaji', 50)->nullable();
            $table->enum('tipe_pekerjaan', ['Full-time', 'Part-time', 'Magang', 'Kontrak', 'Freelance']);
            $table->text('kualifikasi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
