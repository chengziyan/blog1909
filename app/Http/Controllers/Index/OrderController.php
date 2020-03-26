<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //提交订单
    public function confirmorder(){
    	return view('index.success');
    }

     public function address(){
    	return view('index.address');
    }
}
