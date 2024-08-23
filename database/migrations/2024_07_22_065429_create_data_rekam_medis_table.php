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
        Schema::create('data_rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datasolusiterbaik_id');
            $table->foreign('datasolusiterbaik_id')->references('id')->on('data_solusi_terbaiks')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->char('role', 20);
            $table->date('waktu');
            $table->string('hasil_diagnosa');
            $table->text('solusi_terbaik');
            $table->string('kategori_depresi');
            $table->integer('awal');
            $table->integer('akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_rekam_medis');
    }
};
