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
        Schema::create('anggaran', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('jenis_anggaran');
            $table->string('ref1', 50);
            $table->string('kategori_anggaran')->nullable();
            $table->string('ref2', 50)->nullable();
            $table->string('jenis_uraian')->nullable();
            $table->string('ref3', 50)->nullable();
            $table->string('uraian')->nullable();
            $table->string('ref4', 50)->nullable();
            $table->string('tahun_anggaran', 4);
            $table->string('anggaran');
            $table->string('status_anggaran')->default('non revisi');
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
        Schema::drop('anggaran');
    }
};
