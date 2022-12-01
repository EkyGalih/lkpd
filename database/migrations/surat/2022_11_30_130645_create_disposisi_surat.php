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
        Schema::create('disposisi_surat', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('surat_dari');
            $table->date('tgl_surat');
            $table->string('no_surat');
            $table->string('perihal');
            $table->date('tgl_terima');
            $table->string('diteruskan');
            $table->date('tgl_disposisi');
            $table->string('isi_disposisi');
            $table->string('file');
            $table->string('surat_masuk_id', 40)->index()->nullable();
            $table->foreign('surat_masuk_id')
                ->references('id')
                ->on('surat_masuk')
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
        Schema::dropIfExists('disposisi_surat');
    }
};
