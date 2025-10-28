<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_members', function (Blueprint $table) {
            $table->id('id_member');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('alumni_id');
            $table->enum('status', ['daftar', 'hadir', 'batal'])->default('daftar');
            $table->timestamps();

            $table->foreign('event_id')->references('id_event')->on('events')->onDelete('cascade');
            $table->foreign('alumni_id')->references('id_alumni')->on('alumni')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_members');
    }
};
