<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\bahanbaku;

class AdminController extends Controller
{
    public function index()
    {
        $kain = bahanbaku::where('id',1)->first();
        $benang = bahanbaku::where('id',2)->first();
        $dakron = bahanbaku::where('id',3)->first();
        $sum_barang = barang::sum('penjualan');
        
        return view('Admin-Page.Admin',compact('kain','benang','dakron','sum_barang'));
    }
}
