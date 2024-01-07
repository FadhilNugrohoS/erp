<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\order_pembelian;
use App\Models\rfq;
use App\Models\bahanbaku;
use Alert;
use Carbon\Carbon;

class OrderPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pos = order_pembelian::orderBy('id','asc')->paginate(10);
        return view('Po-Page.Po',compact('pos'));
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
    public function show($id)
    {
        $pos = order_pembelian::find($id);
        $pos ->validate = 3;
        $pos ->paid = 2;
        $pos ->save();

        $rfqs = rfq::where('kode_rfq',$pos->kode_rfq)->first();
        $rfqs->status = 3;
        $rfqs->save();
        
        if($pos && $rfqs){
            Alert::success('Data Berhasil Di Validasi');
            return redirect()->route('po.index');
        }
        else{
            Alert::error('Data Gagal Di Validasi');
            return redirect()->route('po.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $now = Carbon::now();

        $pos = order_pembelian::find($id);
        $pos->paid = 3;
        $pos->tanggal_pembayaran = $now->format('d-m-Y');
        $pos->save();

        $rfqs = rfq::where('kode_rfq',$pos->kode_rfq)->first();
        $rfqs->status = 4;
        $rfqs->tanggal_pembayaran = $now->format('d'.'m'.'Y');
        $rfqs->save();

        $bahans = bahanbaku::where('nama_bahan_baku',$pos->bahan_baku)->first();
        $bahans->stok = $bahans->stok + $rfqs->quantity;
        $bahans->save();

        if($pos && $rfqs && $bahans){
            Alert::success('Pembayaran Berhasil');
            return redirect()->route('rfq.index');
        }
        else{
            Alert::error('Pembayaran Gagal');
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
        $pos = order_pembelian::find($id);
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
        $pos = order_pembelian::find($id);
        $pos->paid = 3;
        $pos->save();
        if ($pos) {
            Alert::success('Paid Berhasil ', 'Paid');
            return redirect()->route('po.index');
        } else {
            Alert::error('Paid Gagal', 'Maaf');
            return redirect()->route('po.index');
        }
    }
}
