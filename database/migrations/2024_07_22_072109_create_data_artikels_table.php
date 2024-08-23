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
        Schema::create('data_artikels', function (Blueprint $table) {
            $table->id();
            $table->date('waktu');
            $table->string('judul_artikel');
            $table->text('isi_artikel');
            $table->string('link_artikel');
            $table->string('gambar')->nullable(); // Allows null for no image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_artikels');
    }
};
