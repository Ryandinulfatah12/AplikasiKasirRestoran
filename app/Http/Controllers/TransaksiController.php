<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $data = DB::table('transactions')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->join('orders', 'transactions.order_id_order', '=', 'orders.id_order')
            ->select('transactions.*', 'users.fullname', 'orders.*')
            ->paginate(10);
            return view('admin.pages.transaksi.data', ['data'=>$data]);
    }

    public function delete(Request $req)
    {
        $result = Transaksi::find($req->id);

        if ($result->delete() ){
            alert()->success('Data Berhasil Terhapus dari Database.', 'Terhapus!')->autoclose(3000);
            return redirect()->route('admin.transaksi');
        }
    }

    public function kasir(Request $req)
    {
        $orders = Order::where('status_order','Menunggu Pembayaran')->get();
        
        return view('admin.pages.transaksi.kasir.data', compact('orders'));
    }

    public function payment(Request $req, $id_order)
    {
        $orders =  Order::where('id_order', $id_order)->first();
        $orders->update(['status_order' => 'Beres']);
        return view('admin.pages.transaksi.kasir.payment', ['orders'=>$orders]);
    }

    public function bayar(Request $req)
    {

        $transaksi = new Transaksi;
        $transaksi->user_id = $req->user_id;
        $transaksi->order_id_order = $req->order_id_order;
        $transaksi->total_bayar = $req->total_bayar;
        $transaksi->kembalian = $req->kembalian;

        if ($req->kembalian < 0) {
            return back()->with('result','fail');
        } else {
            alert()->success('Anda Telah Berhasil Melakukan Transaksi.', 'Berhasil!')->autoclose(4000);
            $transaksi->save();

            return redirect()->route('cashier');
        }
    }
}
