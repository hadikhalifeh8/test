<?php

namespace App\Http\Controllers;

use App\customer;
use App\Http\Requests\StoreCustomer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cst = customer::all();
        return view ('Pages.Customer.customer',compact('cst'));
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
    public function store(StoreCustomer $request)
    {
        $insert_cst = new customer();
        $insert_cst->name = $request->name;
        $insert_cst->email = $request->email;
        $insert_cst->phone = $request->phone;

        $insert_cst->save();
        
        toastr()->success('Customer Data Saved Successfully');
        return redirect()->route('Customer.index');
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
    public function update(StoreCustomer $request)
    {
        $cust = customer::findOrFail( $request->id);
        $cust->name = $request->name;
        $cust->email = $request->email;
        $cust->phone = $request->phone;
        
        $cust->save();
        toastr()->success('Customer Data Updated Successfully');
        return redirect()->route('Customer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = customer::findOrFail( $request->id)->delete();
        toastr()->error('Customer Data Deleted Successfully');
        return redirect()->route('Customer.index');
    }
}
