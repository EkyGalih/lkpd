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
        Schema::create('whatsapp', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('no_pengirim');
            $table->string('no_tujuan');
            $table->string('isi_pesan');
            $table->boolean('sudah_baca')->default(false);
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
        Schema::dropIfExists('whatsapp');
    }
};
