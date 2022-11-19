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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->string('id', 40)->primary();
            $table->string('user_id', 40)->index();
            $table->bigInteger('nip')->nullable();
            $table->string('jabatan', 250);
            $table->string('masa_kerja_golongan')->nullable();
            $table->string('diklat')->nullable();
            $table->string('pendidikan', 250);
            $table->string('usia', 10);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->enum('agama', ['islam','hindu','budha','kristen','konghucu']);
            $table->string('kenaikan_pangkat_tahun_berikutnya')->nullable();
            $table->string('batas_pensiun')->nullable();
            $table->string('golongan_id', 40)->index()->nullable();
            $table->string('pangkat_id', 40)->index()->nullable();
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
        Schema::dropIfExists('pegawai');
    }
};
