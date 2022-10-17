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
        Schema::table('iku_realisasi', function (Blueprint $table) {
            $table->foreign('sasaran_strategis_id')
                ->references('id')
                ->on('sasaran_strategis')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indikator_kinerja', function (Blueprint $table) {
            $table->dropIfExists('sasaran_strategis_id');
        });
    }
};
