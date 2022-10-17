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
        Schema::create('realisasi_anggaran', function (Blueprint $table) {
            $table->string('id', 40)->parimary();
            $table->string('jenis_laporan', 100);
            $table->string('ref1', 50)->nullable();
            $table->string('jenis_uraian', 100);
            $table->string('ref2', 50)->nullable();
            $table->string('uraian', 250)->nullable();
            $table->string('ref3', 50)->nullable();
            $table->string('tahun_anggaran', 4)->nullable();
            $table->string('anggaran')->nullable();
            $table->string('realisasi_anggaran')->nullable();
            $table->string('persen', 20)->nullable();
            $table->enum('status_laporan', ['audited', 'unaudited'])->default('unaudited');
            $table->string('user_id', 40);
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
        Schema::drop('realisasi_anggaran');
    }
};
