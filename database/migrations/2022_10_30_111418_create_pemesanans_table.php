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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produk');
            $table->string('kode_pesanan')->nullable();
            $table->string('nama_pemesan');
            $table->string('kontak_pemesan');
            $table->string('alamat_pemesan');
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('berat');
            $table->integer('jumlah');
            $table->string('size');
            $table->integer('quantity');
            $table->string('status');
            $table->integer('total');
            $table->string('kain')->nullable();
            $table->string('benang')->nullable();
            $table->string('dakron')->nullable();
            $table->string('tanggal');
            $table->string('estimasi')->nullable();
            $table->integer('jumlah_estimasi')->nullable();
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
        Schema::dropIfExists('pemesanans');
    }
};
