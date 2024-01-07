<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\quatation;
use App\Models\invoice;
use Carbon\Carbon;
use Alert;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        $customers = Customer::all();
        return view('KasirPenjualan-Page.create',compact('barangs','customers'));
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
        if($request->nama_produk == 'Bantal' && $request->size =='S')
        {
           $barang = barang::where('id',1)->first();
        }
        elseif($request->nama_produk == 'Bantal' && $request->size =='M')
        {
            $barang = barang::where('id',2)->first();
        }
        elseif($request->nama_produk == 'Bantal' && $request->size =='L')
        {
            $barang = barang::where('id',3)->first();
        }

        $tanggal = Carbon::now();

        if($request->nama_produk == 'Bantal'){
            $kode_pesan = "PT-Bina-Karya-$request->size-$request->nama_produk";
        }

        //insert database quatation
        $quatations = quatation::create([
            'id_produk' =>$request->id,
            'kode_pesan' =>$kode_pesan,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'email_customer' => $request->email_customer,
            'nomor_customer' => $request->nomor_customer,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'size' => $request->size,
            'jumlah' => $request->jumlah,
            'status' => 0,
            'total' => $request->total,
            'tanggal' =>$tanggal
        ]);
        
        //insert database invoice
        $invoices = invoice::create([
            'id_produk' =>$request->id,
            'kode_pesan' =>$kode_pesan,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'email_customer' => $request->email_customer,
            'nomor_customer' => $request->nomor_customer,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'size' => $request->size,
            'jumlah' => $request->jumlah,
            'status' => 0,
            'total' => $request->total,
            'tanggal' =>$tanggal,
            'jatuh_tempo' =>$request->jatuh_tempo
        ]);
        if($quatations && $invoices){
            Alert::Success('Data Berhasil Ditambahkan','Success');
            return redirect()->route('quatation.index');
        }
        else{
            Alert::Error('Data Gagal ditambahkan','Error');
            return redirect()->route('sale.index');
        }
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

    public function ajax(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent . '" name="nama_produk" selected>' . ucfirst($row->$dependent) . '</option>';
        }
        echo $output;
    }

    public function ajax1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic1 = $request->get('dynamic1');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic1 . '" name="harga" selected>' . ucfirst($row->$dynamic1) . '</option>';
        }
        echo $output;
    }

    public function ajax2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic2 = $request->get('dynamic2');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic2)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic2 . '" name="size" selected>' . ucfirst($row->$dynamic2) . '</option>';
        }
        echo $output;
    }

    public function ajax3(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent1 = $request->get('dependent1');
        $data = DB::table('customers')
            ->where($select, $value)
            ->groupBy($dependent1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent1 . '" name="nama_customer" selected>' . ucfirst($row->$dependent1) . '</option>';
        }
        echo $output;
    }

    public function ajax4(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic3 = $request->get('dynamic3');
        $data = DB::table('customers')
            ->where($select, $value)
            ->groupBy($dynamic3)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic3 . '" name="alamat_customer" selected>' . ucfirst($row->$dynamic3) . '</option>';
        }
        echo $output;
    }
    public function ajax5(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic4 = $request->get('dynamic4');
        $data = DB::table('customers')
            ->where($select, $value)
            ->groupBy($dynamic4)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic4 . '" name="email_customer" selected>' . ucfirst($row->$dynamic4) . '</option>';
        }
        echo $output;
    }
    public function ajax6(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic5 = $request->get('dynamic5');
        $data = DB::table('customers')
            ->where($select, $value)
            ->groupBy($dynamic5)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic5 . '" name="nomor_customer" selected>' . ucfirst($row->$dynamic5) . '</option>';
        }
        echo $output;
    }
    
}
