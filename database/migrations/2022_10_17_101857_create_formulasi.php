<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulasi', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('indikator_kinerja_id', 40)->index();
            $table->text('formulasi');
            $table->string('tipe_penghitungan', 20);
            $table->string('divisi_id', 40)->index();
            $table->text('alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulasi');
    }
};
