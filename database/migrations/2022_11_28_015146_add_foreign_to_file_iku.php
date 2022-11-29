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
        Schema::table('file_iku', function (Blueprint $table) {
            $table->foreign('sub_kegiatan_iku_id')
                ->references('id')
                ->on('sub_kegiatan_iku')
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
        Schema::table('file_iku', function (Blueprint $table) {
            $table->dropForeign('sub_kegiatan_iku_id');
        });
    }
};
