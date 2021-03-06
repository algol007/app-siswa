<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('siswa', function (Blueprint $table) {
        $table->id();
        $table->string('nisn', 4)->unique();
        $table->string('nama_siswa', 30);
        $table->date('tanggal_lahir');
        $table->enum('jenis_kelamin', ['L', 'P']);
        $table->unsignedBigInteger('id_kelas');
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
      Schema::drop('siswa');
    }
}
