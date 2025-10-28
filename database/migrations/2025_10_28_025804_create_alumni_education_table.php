<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni_education', function (Blueprint $table) {
            $table->id('id_edu');
            $table->unsignedBigInteger('alumni_id');
            $table->enum('jenjang', ['D3', 'S1', 'S2', 'S3', 'Lainnya']);
            $table->string('institusi', 150);
            $table->string('jurusan', 100);
            $table->year('tahun_mulai');
            $table->year('tahun_selesai')->nullable();
            $table->timestamps();

            $table->foreign('alumni_id')->references('id_alumni')->on('alumni')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni_education');
    }
};
