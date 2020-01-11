<?php

namespace App\Http\Controllers;

use Auth;
Use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reportController extends Controller
{
    public function invoice(Request $req)
    {
    	$data = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('orders', 'transactions.order_id_order', '=', 'orders.id_order')
            ->select('transactions.*', 'users.fullname', 'orders.*')
            ->where('orders.kode_order', $req->kode_order)
            ->get();

        $orders = Order::where('kode_order',$req->kode_order)->get();
        $orders->transform(function($order) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
    	return view('admin.pages.report.invoice', compact('data'), compact('orders'));
    }
}