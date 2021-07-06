<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeleponsTable extends Migration
{
    public function up()
    {
        Schema::create('telepons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peminjam');
            $table->string('nomor_telepon');
            $table->timestamps();

            $table->foreign('id_peminjam')->references('id')
                ->on('peminjam')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('telepons');
    }
}
