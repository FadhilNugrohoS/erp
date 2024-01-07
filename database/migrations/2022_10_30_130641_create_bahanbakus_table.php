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
        Schema::create('bahanbakus', function (Blueprint $table) {
            $table->id();
            $table->string('id_produk');
            $table->string('nama_bahan_baku');
            $table->string('berat_satuan');
            $table->integer('harga');
            $table->string('vendor');
            $table->string('deskripsi_bahan_baku');
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
        Schema::dropIfExists('bahanbakus');
    }
};
