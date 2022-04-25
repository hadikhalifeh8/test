<?php

namespace App\Http\Controllers;

use App\customer;

use App\Http\Requests\StoreOrder;
use App\order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = order::all();
        $cstmr = customer::all();
        $prdct  = Product::all();
        return view('Pages.Order.order', compact('order','cstmr', 'prdct'));
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
    public function store(StoreOrder $request)
    {
        $insert_order = new order();

            $insert_order->customer_id = $request->customer_id;
            $insert_order->product_id = $request->product_id;
            $insert_order->save();
    
            toastr()->success('Order Data Saved Successfully');
            return redirect()->route('Order.index');
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
    public function update(StoreOrder $request)
    {
        $updt_order = order::findOrFail( $request->id);

        $updt_order->customer_id = $request->customer_id;
        $updt_order->product_id = $request->product_id;
        $updt_order->save();

        toastr()->success('Order Data Updated Successfully');
        return redirect()->route('Order.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreOrder $request)
    {
        $del_order = order::findOrFail( $request->id)->delete();

        toastr()->error('Order Data Deleted Successfully');
        return redirect()->route('Order.index');
    }


    public function exportToExcel()
    {
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}
