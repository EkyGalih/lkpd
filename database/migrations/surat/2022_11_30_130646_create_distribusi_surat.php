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
        Schema::create('distribusi_surat', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            // $table->string('file_disposisi');
            $table->string('file_surat_id', 40)->index()->nullable();
            $table->string('divisi_id', 40)->index()->nullable();
            $table->foreign('divisi_id')
                ->references('id')
                ->on('divisi')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('distribusi_surat');
    }
};
