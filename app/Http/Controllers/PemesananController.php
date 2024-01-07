<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;
use App\Models\barang;
use App\Models\bom;
use App\Models\bahanbaku;
use App\Models\mad;
use Alert;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('Pemesanan-Page.Pemesanan',compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemesanan-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemesanan::create($request->all());
        return redirect()->route('pemesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::find($id);
        return view('Pemesanan-page.edit',compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        $pemesanan = pemesanan::find($id);
        $pemesanan->update($request->all());
        return redirect()->route('pemesanan.index');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Pemesanan::find($id);
        $delete->delete();
        return redirect()->route('pemesanan.index');
    }

    public function proses($id)
    {
        //inisialisasi variabel untuk menampung data bahan baku
        $bahan_kain = bahanbaku::find(1);
        $bahan_kain = $bahan_kain->stok;
        $bahan_benang = bahanbaku::find(2);
        $bahan_benang = $bahan_benang->stok;
        $bahan_dakron = bahanbaku::find(3);
        $bahan_dakron = $bahan_dakron->stok;

        $mad = mad::all();
        $pemesanans = pemesanan::find($id);
        $barangs = barang::find($pemesanans->id_produk); //pengambilan data dari tabel pemesanan

        $pesan_kain = $pemesanans->kain;
        $pesan_benang = $pemesanans->benang;
        $pesan_dakron = $pemesanans->dakron;

        // cek ketersediaan bahan  CA (Check Avaibiltiy)
        if($bahan_kain >= $pesan_kain && $bahan_benang >= $pesan_benang && $bahan_dakron >= $pesan_dakron){
            
            //jika bahan mencukupi maka pesanan diproses

            $min_kain = $bahan_kain - $pesan_kain;
            $min_benang = $bahan_benang - $pesan_benang;
            $min_dakron = $bahan_dakron - $pesan_dakron;

            // proses update stok bahan baku
            $new_kain = bahanbaku::find(1);
            $new_kain->stok = $min_kain;
            $new_kain->save();
            
            $new_benang = bahanbaku::find(2);
            $new_benang ->stok = $min_benang;
            $new_benang->save();
            
            $new_dakron = bahanbaku::find(3);
            $new_dakron ->stok = $min_dakron;
            $new_dakron->save();

            $mad = mad::create([
                'kode_pesanan'=> $pemesanans->kode_pesanan,
                'nama_pemesan' =>$pemesanans->nama_pemesan,
                'kontak_pemesan' =>$pemesanans->kontak_pemesan,
                'alamat_pemesan' =>$pemesanans->alamat_pemesan,
                'nama_produk'=>$pemesanans->nama_produk,
                'harga'=>$pemesanans->harga,
                'jumlah'=>$pemesanans->jumlah,
                'size'=>$pemesanans->size,
                'quantity'=>$pemesanans->quantity,
                'status'=>$pemesanans->status,
                'total'=>$pemesanans->total,
                'kain'=>$pemesanans->kain,
                'benang'=>$pemesanans->benang,
                'dakron'=>$pemesanans->dakron,
                'tanggal'=>$pemesanans->tanggal,
                'estimasi'=>$pemesanans->estimasi,
            ]);

            // proses update status
            $mad->status = 1;
            $mad->save();
            $barangs->stok = $barangs->stok + $pemesanans->jumlah;
            $barangs->save();

            $pemesanans->delete(); // menghapus pesanan yang telah diproses

            Alert::success('Pesanan Berhasil Diproses');
            return redirect()->route('mad.index');
        }else{
            Alert::error('Pesanan Tidak Dapat Diproses,Silahkan tambah Stok');
            return redirect()->route('bahanbaku.index');
        }
        
    }
}
