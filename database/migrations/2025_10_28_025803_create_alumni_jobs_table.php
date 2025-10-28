<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni_jobs', function (Blueprint $table) {
            $table->id('id_job');
            $table->unsignedBigInteger('alumni_id');
            $table->string('perusahaan', 150);
            $table->string('posisi', 100);
            $table->string('alamat_perusahaan', 255)->nullable();
            $table->string('bidang', 100)->nullable();
            $table->date('mulai_bekerja');
            $table->date('akhir_bekerja')->nullable();
            $table->enum('status', ['aktif', 'resign'])->default('aktif');
            $table->timestamps();

            $table->foreign('alumni_id')->references('id_alumni')->on('alumni')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni_jobs');
    }
};
