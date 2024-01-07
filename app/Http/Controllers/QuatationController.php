<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quatation;
use App\Models\barang;
use App\Models\customer;
use Alert;

class QuatationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quatations = quatation::all();
        return view('Quatation-Page.Quatation',compact('quatations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Quatation-Page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    public function proses($id)
    {
        $quatations = quatation::find($id);
        $quatations->status = 1;
        $quatations->save();

        if($quatations)
        {
            Alert::success('Success','Stok Tersedia');
            return redirect()->route('quatation.index');
        }
        else{
            Alert::error('Error','Stok Tidak Tersedia');
            return redirect()->route('quatation.index');
        }
    }
}
