<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamTable extends Migration
{
    public function up()
    {
        Schema::create('peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjam')->unique();
            $table->string('nama_peminjam');
            $table->string('foto_peminjam', 32)->nullable();
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->unsignedBigInteger('jenis_id');
            $table->timestamps();

            $table->foreign('jenis_id')->references('id')
                ->on('jenis_peminjams')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjam');
    }
}
