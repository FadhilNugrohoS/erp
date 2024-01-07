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
        Schema::create('order_pembelians', function (Blueprint $table) {
            $table->id();
            $table->boolean('receive')->default(0);
            $table->integer('validate');
            $table->integer('paid');
            $table->string('kode_rfq');
            $table->string('nama_vendor');
            $table->string('email_vendor');
            $table->string('telpon_vendor');
            $table->string('bahan_baku');
            $table->integer('harga');
            $table->integer('quantity');
            $table->integer('total');
            $table->string('tanggal_pesan');
            $table->string('tanggal_pembayaran');
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
        Schema::dropIfExists('order_pembelians');
    }
};
