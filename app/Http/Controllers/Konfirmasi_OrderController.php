<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rfq;
use App\Models\konfirmasi_order;
use App\Models\order_pembelian;
use App\Models\vendor;
use Carbon\Carbon;
use Alert;

class Konfirmasi_OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $konfirmasis = konfirmasi_order::where('id_vendor',$id)->orderBy('id','asc')->get();
        return view('Vendor-Page.konfirmasi_pesanan',compact('konfirmasis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function confirm($id, $kode_rfq)
    {
        $now = carbon::now();
        
        $konfirmasi_order = konfirmasi_order::where('kode_rfq',$kode_rfq)->first();
        $purchase_order = order_pembelian::create([
            'receive' => 0,
            'validate' => 1,
            'paid' => 1,
            'tanggal_pembayaran' => 'Menunggu Pembayaran',
            'kode_rfq' => $konfirmasi_order->kode_rfq,
            'nama_vendor' => $konfirmasi_order->nama_vendor,
            'email_vendor' => $konfirmasi_order->email_vendor,
            'telpon_vendor' => $konfirmasi_order->telpon_vendor,
            'bahan_baku' => $konfirmasi_order->bahan_baku,
            'harga' => $konfirmasi_order->harga,
            'quantity' => $konfirmasi_order->quantity,
            'total' => $konfirmasi_order->total,
            'tanggal_pesan' => $konfirmasi_order->tanggal_pesan,
        ]);

        $update_status_rfq = rfq::where('kode_rfq',$kode_rfq)->first();
        $update_status_rfq->status = 2;
        $update_status_rfq->tanggal_confirm_vendor = $now->format('d-m-Y,H:i');
        $update_status_rfq->save();

        $update_count_vendor = vendor::where('id',$konfirmasi_order->id_vendor)->first();
        $update_count_vendor->request_order = $update_count_vendor->request_order - 1 ;
        $update_count_vendor->save();

        $delete_confirm = konfirmasi_order::where('kode_rfq',$kode_rfq)->first()->delete();

        if ($purchase_order) {
            Alert::success('Data Berhasil Dikonfirmasi');
            return redirect()->route('rfq.index');
        } else {
            Alert::error('Data Gagal Dikonfirmasi');
            return redirect()->route('confirm.index');
        }
    }
}
