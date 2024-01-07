<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        barang::create([
            'kode_produk' => 'B001',
            'nama_produk' => 'Bantal',
            'ukuran_panjang' => '30',
            'ukuran_lebar' => '40',
            'harga' => 50000,
            'berat' => 500,
            'size' => 'S',
            'deskripsi_produk' => 'Bantal dakron',
            'penjualan' => 0,
            'foto' => 0,
        ]);
        barang::create([
            'kode_produk' => 'B002',
            'nama_produk' => 'Bantal',
            'ukuran_panjang' => '50',
            'ukuran_lebar' => '70',
            'harga' => 75000,
            'berat' => 750,
            'size' => 'M',
            'deskripsi_produk' => 'Bantal dakron',
            'penjualan' => 0,
            'foto' => 0,
        ]);
        barang::create([
            'kode_produk' => 'B003',
            'nama_produk' => 'Bantal',
            'ukuran_panjang' => '70',
            'ukuran_lebar' => '90',
            'harga' => 100000,
            'berat' => 1000,
            'size' => 'L',
            'deskripsi_produk' => 'Bantal dakron',
            'penjualan' => 0,
            'foto' => 0,
        ]);
    }
}
