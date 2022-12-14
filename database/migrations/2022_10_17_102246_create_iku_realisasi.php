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
        Schema::create('iku_realisasi', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('kode_iku', 100);
            $table->string('sasaran_strategis_id', 40)->index();
            $table->string('indikator_kinerja_id', 40)->index();
            $table->string('formula_id', 40)->index();
            $table->string('target', 50);
            $table->string('target_tercapai', 50)->default(0);
            $table->string('user_id', 40)->index();
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
        Schema::dropIfExists('iku_realisasi');
    }
};
