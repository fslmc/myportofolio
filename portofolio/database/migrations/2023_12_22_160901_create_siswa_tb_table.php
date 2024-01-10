<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTbTable extends Migration
{
    public function up()
    {
        Schema::create('siswa_tb', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telp');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswa_tb');
    }
}
