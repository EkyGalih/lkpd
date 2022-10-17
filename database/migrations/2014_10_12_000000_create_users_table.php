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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->text('foto')->nullable();
            $table->string('password');
            $table->enum('jenis_pegawai', ['admin', 'pimpinan', 'pegawai'])->default('pegawai');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
