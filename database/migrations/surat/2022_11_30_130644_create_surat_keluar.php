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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('jenis_surat', 100);
            $table->string('staff_bagian');
            $table->date('tgl_surat');
            $table->string('kd_klasifikasi', 100);
            $table->string('no_surat')->nullable();
            $table->string('perihal');
            $table->enum('status_persetujuan', ['progress', 'diajukan', 'tidak setuju', 'disetujui'])->default('progress');
            $table->string('file_surat_id', 40)->index()->nullable();
            $table->foreign('file_surat_id')
                ->references('id')->on('file_surat')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('surat_keluar');
    }
};
