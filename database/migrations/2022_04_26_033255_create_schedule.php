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
        Schema::create('schedule', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('jenis_acara', '100');
            $table->date('tgl_acara');
            $table->time('jam_acara');
            $table->string('lokasi_acara', 100);
            $table->text('redaksi_acara');
            $table->string('acara_dari', 100);
            $table->string('user_id', 40);
            $table->enum('status', ['0', '1'])->default('0');
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
        Schema::drop('schedule');
    }
};
