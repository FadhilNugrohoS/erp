<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\bahanbaku;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bahanbaku::create([
            'id_produk' => 'B001',
            'nama_bahan_baku' => 'Kain',
            'berat_satuan' => '500 gram',
            'harga' => 2500,
            'vendor' => 'PT.A',
            'deskripsi_bahan_baku' => '1 x 1 Meter',
            'stok' => 0,
            'foto' => 0,
        ]);
        bahanbaku::create([
            'id_produk' => 'B002',
            'nama_bahan_baku' => 'Benang',
            'berat_satuan' => '250 gram',
            'harga' => 5000,
            'vendor' => 'PT.B',
            'deskripsi_bahan_baku' => 'Benang 1 Roll',
            'stok' => 0,
            'foto' => 0,
        ]);
        bahanbaku::create([
            'id_produk' => 'B003',
            'nama_bahan_baku' => 'Dakron',
            'berat_satuan' => '0.25 kg',
            'harga' => 10000,
            'vendor' => 'PT.C',
            'deskripsi_bahan_baku' => 'Dakron 0.25 kg',
            'stok' => 0,
            'foto' => 0,
        ]);
    }
}
