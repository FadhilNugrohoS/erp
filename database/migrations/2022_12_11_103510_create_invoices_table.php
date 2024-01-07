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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produk');
            $table->string('kode_pesan');
            $table->string('nama_produk');
            $table->string('size');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->integer('status');
            $table->string('tanggal');
            $table->string('nama_customer');
            $table->string('alamat_customer');
            $table->string('email_customer');
            $table->string('nomor_customer');
            $table->string('jatuh_tempo')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
