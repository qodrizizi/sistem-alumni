<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni_achievements', function (Blueprint $table) {
            $table->id('id_achievement');
            $table->unsignedBigInteger('alumni_id');
            $table->string('nama_prestasi', 150);
            $table->enum('tingkat', ['Sekolah', 'Kabupaten', 'Provinsi', 'Nasional', 'Internasional']);
            $table->string('penyelenggara', 150)->nullable();
            $table->year('tahun')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('alumni_id')->references('id_alumni')->on('alumni')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni_achievements');
    }
};
