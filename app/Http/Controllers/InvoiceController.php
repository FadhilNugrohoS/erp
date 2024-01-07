<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;
use App\Models\barang;
use Alert;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoice::all();
        return view('Invoice-Page.Invoice',compact('invoices'));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoices = invoice::find($id);
        return view('Invoice-Page.tempo',compact('invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoice)
    {
        $invoice->update([
            'jatuh_tempo' => $request->jatuh_tempo
        ]);
        if($invoice){
            Alert::success('Register Payment Berhasil','Success');
            return redirect()->route('invoice.index');
        }
        else{
            Alert::error('Register Payment Error','Error');
            return redirect()->route('invoice.index');
        }
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

    public function paid($id)
    {
        $invoices = invoice::find($id);
        $invoices->status = 1;
        $invoices->save();
        if ($invoices) {
            Alert::success('Paid Berhasil ', 'Paid');
            return redirect()->route('invoice.index');
        } else {
            Alert::error('Paid Gagal', 'Maaf');
            return redirect()->route('invoice.index');
        }
    }

    public function proses($id)
    {
        $invoices = invoice::find($id);
        $invoices->status = 2;
        $invoices->save();
        
        $barangs = barang::all();
        if($invoices->nama_produk == "Bantal" && $invoices->size == "S")
        {
            $barangs = barang::find(1);
           
        }
        elseif($invoices->nama_produk == "Bantal" && $invoices->size == "M")
        {
            $barangs = barang::find(2);
        }
        elseif($invoices->nama_produk == "Bantal" && $invoices->size == "L")
        {
            $barangs = barang::find(3);
        }

        $barangs->stok = $barangs->stok - $invoices->jumlah;
        $barangs->penjualan = $invoices->jumlah + $barangs->penjualan;
        $barangs->save();
        
        if($invoices && $barangs){
            Alert::success('Pembayaran Berhasil','Success');
            return redirect()->route('invoice.index');
        }
        else{
            Alert::error('Pembayaran Gagal','Error');
            return redirect()->route('invoice.index');
        }
    }
}
