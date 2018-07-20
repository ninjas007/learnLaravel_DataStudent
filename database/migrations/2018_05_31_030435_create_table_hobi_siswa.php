<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHobiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // buat table hobi_siswa
        Schema::create('hobi_siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_siswa')->unsigned()->index();
            $table->integer('id_hobi')->unsigned()->index();
            $table->timestamps();

        // Set Primary Key
            $table->primary(['id_siswa', 'id_hobi']);

        // Set FK hobi_siswa --> siswa
            $table->foreign('id_siswa')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');

        // set FK hobi_siswa --> hobi
            $table->foreign('id_hobi')->references('id')->on('hobi')->onDelete('cascade')->onUpdate('cascade');
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
