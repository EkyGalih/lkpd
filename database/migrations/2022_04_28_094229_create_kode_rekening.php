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
        Schema::create('kode_rekening', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('nama_rekening', 250);
            $table->string('kode_rekening', 100)->unique();
            $table->string('ref', 40)->nullable();
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
        Schema::drop('kode_rekening');
    }
};
