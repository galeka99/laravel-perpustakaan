<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->unsignedBigInteger('id_peminjam');
            $table->unsignedBigInteger('id_buku');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->timestamps();

            $table->foreign('id_peminjam')->references('id')->on('peminjam')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_buku')->references('id')->on('bukus')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
