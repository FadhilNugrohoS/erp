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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk');
            $table->string('nama_produk');
            $table->string('ukuran_panjang');
            $table->string('ukuran_lebar');
            $table->integer('harga');
            $table->integer('berat');
            $table->string('size');
            $table->string('deskripsi_produk');
            $table->integer('penjualan');
            $table->integer('stok');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('barangs');
    }
};
