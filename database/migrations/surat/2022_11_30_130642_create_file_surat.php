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
        Schema::create('file_surat', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('divisi_id', 40)->index();
            $table->foreign('divisi_id')
                ->references('id')
                ->on('divisi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('perihal');
            $table->text('file');
            $table->enum('jenis_surat', ['masuk', 'keluar']);
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
        Schema::dropIfExists('file_surat');
    }
};
