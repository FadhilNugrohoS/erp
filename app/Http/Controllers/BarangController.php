<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('Barang-Page.Barang',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Barang-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request,[
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2408'
        ]);

        //upload image
        $image = $request->file('foto');
        $image->storeAs('public/posts',$image->hashName());
        Barang::create([
            'foto'=> $image->hashName(),
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'ukuran_panjang' => $request->ukuran_panjang,
            'ukuran_lebar' => $request->ukuran_lebar,
            'harga' => $request->harga,
            'berat' => $request->berat,
            'size' => $request->size,
            'deskripsi_produk' => $request->deskripsi_produk,
            'penjualan' => 0,
            'stok' => 0
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        $barang = Barang::find($barang->id);
        return view('Barang-page.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
                //validate form
                $this->validate($request,[
                    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2408'
                ]);
        
                //upload image
                $image = $request->file('foto');
                $image->storeAs('public/posts',$image->hashName());
                $barang->update([
                    'foto'=> $image->hashName(),
                    'kode_produk' => $request->kode_produk,
                    'nama_produk' => $request->nama_produk,
                    'ukuran_panjang' => $request->ukuran_panjang,
                    'ukuran_lebar' => $request->ukuran_lebar,
                    'harga' => $request->harga,
                    'berat' => $request->berat,
                    'size' => $request->size,
                    'deskripsi_produk' => $request->deskripsi_produk,
                    'penjualan' => $request->penjualan,
                    'stok' => $request->stok
                ]);
                return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Barang::find($id);
        $delete->delete();
        return redirect()->route('barang.index');
    }
}
