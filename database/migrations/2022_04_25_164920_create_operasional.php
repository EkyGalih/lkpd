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
        Schema::create('operasional', function (Blueprint $table) {
            $table->string('id', 40)->parimary();
            $table->string('jenis_laporan', 100);
            $table->string('ref1', 100)->nullable();
            $table->string('uraian', 250)->nullable();
            $table->string('ref2', 100)->nullable();
            $table->string('sub_uraian', 250);
            $table->string('ref3', 100)->nullable();
            $table->string('tahun_anggaran', 4)->nullable();
            $table->string('anggaran')->nullable();
            $table->string('kenaikan_penurunan')->nullable();
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
        Schema::drop('operasional');
    }
};
