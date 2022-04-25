<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customers';
    protected $fillable=['name','email,phone'];
}
