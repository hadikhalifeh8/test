<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

class Order_api_controller extends RoutingController
{
    public function index()
    {
        $orders = order::get();
        
 
        $array = [
            'data' =>$orders,
            'message' => 'ok',
            'status' => 200,
        ];


        return response($array);
    }
}
