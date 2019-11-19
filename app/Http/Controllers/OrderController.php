<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function data() {
    	return view('admin.pages.order.data');
    }
}
