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
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->enum('jenis_surat', ['umum', 'undangan']);
            $table->date('tgl_terima');
            $table->string('asal_surat', 30);
            $table->date('tgl_surat');
            $table->string('kd_klasifikasi', 100);
            $table->string('no_surat', 30);
            $table->string('perihal', 100);
            $table->string('diteruskan', 250)->nullable();
            $table->date('tgl_disposisi')->nullable();
            $table->string('isi_disposisi', 100)->nullable();
            $table->enum('status_surat', ['progress', 'read', 'unread'])->default('progress');
            $table->string('file_surat_id', 40)->index();
            $table->foreign('file_surat_id')
                ->references('id')
                ->on('file_surat')
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
        Schema::dropIfExists('surat_masuk');
    }
};
