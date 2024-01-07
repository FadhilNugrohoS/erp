<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\accounting;
use App\Models\invoice;
use App\Models\rfq;
use PDF;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoice::where('status','>',0 )->paginate(10);
        return view('Accounting-Page.Customer-Rekap', compact('invoices'));
    }

    public function cetak_pdf()
    {
    	$invoices = invoice::where('status','>',0)->get();

        $tota = invoice::where('status','>',0)->get();

        $total = $tota->sum('total');

    	$pdf = PDF::loadview('Accounting-Page/rekap_penjualan',['invoices'=>$invoices],['total' => $total]);
    	return $pdf->stream('Laporan-Penjualan');
        
    }
    

    public function pengeluaran()
    {
        $rfqs = rfq::where('status','>',3 )->paginate(10);
        return view('Accounting-Page.RFQ-Rekap', compact('rfqs'));
    }

    public function cetak_pengeluaran()
    {
    	$rfqs = rfq::where('status','>',3)->get();

        $tota = rfq::where('status','>',3)->get();

        $total = $tota->sum('total');

    	$pdf = PDF::loadview('Accounting-Page/rekap_pengeluaran',['rfqs'=>$rfqs],['total' => $total]);
    	return $pdf->stream('Laporan-Pengeluaran');
        
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
}
