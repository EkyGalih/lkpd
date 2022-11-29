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
        Schema::table('kegiatan_iku', function (Blueprint $table) {
            $table->foreign('divisi_id')
                ->references('id')
                ->on('divisi')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('program_iku_id')
                ->references('id')
                ->on('program_anggaran_iku')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('indikator_kinerja_id')
                ->references('id')
                ->on('indikator_kinerja')
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
        Schema::table('kegiatan_iku', function (Blueprint $table) {
            $table->dropForeign('divisi_id');
            $table->dropForeign('program_iku_id_id');
            $table->dropForeign('indikator_kinerja_id');
        });
    }
};
