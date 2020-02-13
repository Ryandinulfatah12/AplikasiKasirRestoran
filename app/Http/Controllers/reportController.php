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

    public function delivery(Request $req)
    {
        $orders = Order::where('id_user',Auth::id())
                ->orderBy('updated_at','desc')->take(1)->get();
        $orders->transform(function($order) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('admin.pages.report.delivery', compact('orders'));
    }

    public function buat(Request $req)
    {
        $data = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('orders', 'transactions.order_id_order', '=', 'orders.id_order')
            ->select('transactions.*', 'users.fullname', 'orders.*')
            ->orderBy('transactions.updated_at','desc')
            ->get();

        $pendapatan = DB::table('orders')->sum('subtotal');

        return view('admin.pages.report.buat', compact('data'), compact('pendapatan'));
    }

    public function print(Request $req)
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
        return view('admin.pages.report.print',compact('data'),compact('orders'));
    }


}
