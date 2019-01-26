<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_surat');
            $table->date('tanggal');
            $table->integer('tujuan')->unsigned();
            $table->foreign('tujuan')->references('id')->on('users');
            $table->string('asal_surat');
            $table->string('perihal');
            $table->string('file_surat');
            $table->enum('status',['Pending','Diterima','Ditolak'])->default('Pending');
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
        Schema::dropIfExists('surat_masuk');
    }
}
