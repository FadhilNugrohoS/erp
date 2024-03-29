<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\puchase_order;
use App\Models\rfq;
use App\Models\bahan_baku;
use Alert;
use Carbon\Carbon;

class POController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pos = puchase_order::orderBy('id', 'desc')->paginate(10);
        return view('admins.PO.tampilpo', compact('pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Alih Fungsi Menjadi Tombol Validasi
    public function show($id)
    {
        $pos = puchase_order::find($id);
        $pos->validate = 3;
        $pos->paid = 2;
        $pos->save();

        $rfq = rfq::where('kode_rfq', $pos->kode_rfq)->first();
        $rfq->status = 3;
        $rfq->save();

        if ($pos && $rfq) {
            Alert::success('Data Berhasil Di Validasi', 'Tervalidai');
            return redirect()->route('po.index');
        } else {
            Alert::error('Data Gagal Di Validasi', 'Maaf');
            return redirect()->route('po.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Alih Fungsi Menjadi Tombol Paid
    public function edit($id)
    {
        $now = Carbon::now();

        $pos = puchase_order::find($id);
        $pos->paid = 3;
        $pos->tgl_bayar = $now->format('Y-m-d, H:i');
        $pos->save();

        $rfq = rfq::where('kode_rfq', $pos->kode_rfq)->first();
        $rfq->status = 4;
        $rfq->tgl_pembayaran = $now->format('Y-m-d, H:i');
        $rfq->save();

        $bahan_baku = bahan_baku::where('bahan', $pos->nama_bahan_baku)->first();
        dd($bahan_baku);
        $bahan_baku->stok = $bahan_baku->stok + $rfq->quantity;
        $bahan_baku->save();

        if ($pos && $rfq && $bahan_baku) {
            Alert::success('Paid Berhasil', 'Paid');
            return redirect()->route('rfq.index');
        } else {
            Alert::error('Paid Gagal', 'Maaf');
            return redirect()->route('po.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //   
    }

    public function receive($id)
    {
        $pos = puchase_order::find($id);
        $pos->receive = 1;
        $pos->validate = 2;
        $pos->save();

        if ($pos) {
            Alert::success('Receive Berhasil ', 'Receive');
            return redirect()->route('po.index');
        } else {
            Alert::error('Receive Gagal', 'Maaf');
            return redirect()->route('po.index');
        }
    }

    public function paid($id)
    {
        $po = puchase_order::find($id);
        return view('admins.PO.paidpo', compact('po'));
    }
}
