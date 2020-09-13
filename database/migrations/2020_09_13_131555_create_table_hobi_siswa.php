<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHobiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_hobi');
            $table->timestamps();

            $table->primary(['id_siswa', 'id_hobi']);

            $table->foreign('id_siswa')->references('id')->on('siswa')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('id_hobi')->references('id')->on('hobi')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobi_siswa');
    }
}
