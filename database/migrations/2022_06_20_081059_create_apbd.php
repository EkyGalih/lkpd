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
        Schema::create('apbd', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('kode_rekening', 50)->unique();
            $table->string('nama_rekening');
            $table->string('uraian')->nullable();
            $table->string('sub_uraian')->nullable();
            $table->bigInteger('jml_anggaran_sebelum')->nullable();
            $table->bigInteger('jml_anggaran_setelah')->nullable();
            $table->bigInteger('selisih_anggaran')->nullable();
            $table->string('persen', 3)->nullable();
            $table->string('user_id')->index();
            $table->string('tahun_anggaran', 4);
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
        Schema::dropIfExists('apbd');
    }
};
