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
        Schema::create('sub_kegiatan_iku', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->text('sub_kegiatan');
            $table->text('indikator_kinerja');
            $table->string('target_kinerja', 100);
            $table->string('kode_kegiatan_iku', 15)->index();
            $table->double('persentase')->nullable();
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
        Schema::dropIfExists('sub_kegiatan_iku');
    }
};
