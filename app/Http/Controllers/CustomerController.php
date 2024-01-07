<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Alert;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::all();
        return view('Customer-Page.Customer',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customer-Page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = Customer::create([
            'nama_customer' =>$request->nama,
            'email_customer' =>$request->email,
            'alamat_customer' =>$request->alamat,
            'nomor_customer' =>$request->nomor,
        ]);
        if($customers){
            Alert::success('Data Berhasil Ditambahkan','Succeess');
            return redirect()->route('customer.index');
        }
        else{
            Alert::error('Data Gagal Ditambahkan','Error');
            return redirect()->route('customer.create');
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
        $customer = Customer::find($id);
        return view('Customer-Page.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer $customer)
    {
        $customer->update([
            'nama_customer' =>$request->nama,
            'email_customer' =>$request->email,
            'alamat_customer' =>$request->alamat,
            'nomor_customer' =>$request->nomor,
        ]);
        if($customer){
            Alert::success('Data Berhasil Ditambahkan','Succeess');
            return redirect()->route('customer.index');
        }
        else{
            Alert::error('Data Gagal Ditambahkan','Error');
            return redirect()->route('customer.create');
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
        $delete = Customer::find($id);
        $delete->delete();
        return redirect()->route('customer.index');
    }
}
