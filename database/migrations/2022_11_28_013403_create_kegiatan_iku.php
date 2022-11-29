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
        Schema::create('kegiatan_iku', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->text('nama_kegiatan');
            $table->string('kode_kegiatan', 15);
            $table->string('divisi_id', 40)->index();
            $table->string('program_iku_id', 40)->index();
            $table->string('indikator_kinerja_id', 40)->index();
            $table->string('tahun', 4);
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
        Schema::dropIfExists('kegiatan_iku');
    }
};
