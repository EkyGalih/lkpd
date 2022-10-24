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
        Schema::create('total_saldo', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->enum('jenis_keuangan', ['arus_kas', 'realisasi_anggaran', 'neraca', 'ekuitas', 'perubahan_saldo', 'operasional']);
            $table->string('kode_unik', 40);
            $table->string('ref', 50);
            $table->string('sub_total', 250);
            $table->string('total', 250);
            $table->string('tahun_anggaran', 4);
            $table->string('bulan', 20)->nullable();
            $table->string('minggu', 4)->nullable();
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
        Schema::drop('total_saldo');
    }
};
