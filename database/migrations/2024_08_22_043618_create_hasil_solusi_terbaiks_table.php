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
        Schema::create('hasil_solusi_terbaiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('datasolusiterbaik_id');
            $table->foreign('datasolusiterbaik_id')->references('id')->on('data_solusi_terbaiks')->onDelete('cascade');
            // $table->unsignedBigInteger('tes_id');
            $table->date('waktu');
            $table->timestamps();
            // $table->foreign('tes_id')->references('id')->on('tes_kesehatan_mentals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_solusi_terbaiks');
    }
};
