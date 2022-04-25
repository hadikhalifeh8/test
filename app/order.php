<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class order extends Model
{
    protected $table = 'orders';
    protected $fillable=['customer_id', 'product_id	'];


    public function customer_rltn()
    {
        return $this->belongsTo('App\customer', 'customer_id');
    }


    public function product_rltn()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }


  //excel 
  public static function getAllOrders()
  {
      $reslt = DB::table('orders')
              ->select('id','customer_id','product_id')
              ->get()->toArray();
              return $reslt;
  }  
    

}
