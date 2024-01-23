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
        Schema::create('futsals', function (Blueprint $table) {
            $table->id();
           
            $table->string('nama_club');
            $table->string('anggota');
            $table->time('waktu_pendaftaran')->nullable;
            $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('futsals');
    }

};
