<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bahanbaku;
use App\Models\vendor;
use Illuminate\Support\Facades\DB;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahanbakus = BahanBaku::latest()->paginate(10);
        return view('BahanBaku-Page.BahanBaku',compact('bahanbakus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BahanBaku-page.create');
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
        $data = BahanBaku::create([
            'foto'=> $image->hashName(),
            'id_produk' => $request->id_produk,
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'berat_satuan' => $request->berat_satuan,
            'harga' => $request->harga,
            'vendor' => $request->vendor,
            'deskripsi_bahan_baku' => $request->deskripsi_bahan_baku,
            'stok' => 0
        ]);
        return redirect()->route('bahanbaku.index');
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
    public function edit(bahanbaku $bahanbaku)
    {
        $bahanbaku = bahanbaku::find($bahanbaku->id);
        return view('BahanBaku-page.edit',compact('bahanbaku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bahanbaku $bahanbaku)
    {
                //validate form
                $this->validate($request,[
                    'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2408'
                ]);
        
                //upload image
                $image = $request->file('foto');
                $image->storeAs('public/posts',$image->hashName());
                $bahanbaku->update([
                    'foto'=> $image->hashName(),
                    'id_produk' => $request->id_produk,
                    'nama_bahan_baku' => $request->nama_bahan_baku,
                    'berat_satuan' => $request->berat_satuan,
                    'harga' => $request->harga,
                    'vendor' => $request->vendor,
                    'deskripsi_bahan_baku' => $request->deskripsi_bahan_baku
                ]);
                return redirect()->route('bahanbaku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = BahanBaku::find($id);
        $delete->delete();
        return redirect()->route('bahanbaku.index');
    }

    public function vendor($id)
    {
        if($id == 1){
            $vendors = vendor::where('bahan_baku','Kain')->get();
            return view('Vendor-Page.Vendor',compact('vendors'));
        }
        elseif($id == 2){
            $vendors = vendor::where('bahan_baku','Benang')->get();
            return view('Vendor-Page.Vendor',compact('vendors'));
        }
        elseif($id ==3){
            $vendors = vendor::where('bahan_baku','Dakron')->get();
            return view('Vendor-Page.Vendor',compact('vendors'));
        }
    }
}
