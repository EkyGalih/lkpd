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
        Schema::create('program_anggaran_iku', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('program', 150);
            $table->bigInteger('anggaran');
            $table->bigInteger('anggaran_terpakai');
            $table->string('persentase_anggaran', 3);
            $table->text('keterangan');
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
        Schema::dropIfExists('program_anggaran_iku');
    }
};
