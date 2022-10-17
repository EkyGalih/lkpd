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
        Schema::table('iku_realisasi', function (Blueprint $table) {
            $table->foreign('divisi_id')
                ->references('id')
                ->on('divisi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iku_realisasi', function (Blueprint $table) {
            $table->dropIfExists('divisi_id');
        });
    }
};
