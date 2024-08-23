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
        Schema::create('tes_kesehatan_mentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('jawaban_id');
            $table->foreign('jawaban_id')->references('id')->on('data_jawabans')->onDelete('cascade');
            $table->unsignedBigInteger('keterangan_id');
            $table->foreign('keterangan_id')->references('id')->on('keterangan_tes')->onDelete('cascade');
            // $table->date('waktu');
            // $table->string('keterangan');
            // $table->integer('pernyataan1');
            // $table->integer('pernyataan2');
            // $table->integer('pernyataan3');
            // $table->integer('pernyataan4');
            // $table->integer('pernyataan5');
            // $table->integer('pernyataan6');
            // $table->integer('pernyataan7');
            // $table->integer('pernyataan8');
            // $table->integer('pernyataan9');
            // $table->integer('pernyataan10');
            // $table->integer('pernyataan11');
            // $table->integer('pernyataan12');
            // $table->integer('pernyataan13');
            // $table->integer('pernyataan14');
            // $table->integer('pernyataan15');
            // $table->integer('pernyataan16');
            // $table->integer('pernyataan17');
            // $table->integer('pernyataan18');
            // $table->integer('pernyataan19');
            // $table->integer('pernyataan20');
            // $table->integer('pernyataan21');
            // $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_kesehatan_mentals');
    }
};

