<?php

namespace App\Http\Controllers;

use App\Transaksi;
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
        // $data = Transaksi::join('users','users.id','transaksi.id_user')
        //     ->select('transaksi.*', 'fullname')
        //     ->orderBy('updated_at','desc')
        //     ->paginate(10);
        //     return view('admin.pages.transaksi.data', ['data'=>$data]);  

        $data = DB::table('transaksi')
            ->join('users', 'transaksi.user_id', '=', 'users.id')
            ->join('orders', 'transaksi.order_id', '=', 'orders.id_order')
            ->select('transaksi.*', 'users.fullname', 'orders.*')
            ->paginate(10);
            return view('admin.pages.transaksi.data', ['data'=>$data]);
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
    public function store(Request $req)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $result = Transaksi::find($req->id);

        if ($result->delete() ){
            alert()->success('Data Berhasil Terhapus dari Database.', 'Terhapus!')->autoclose(3000);
            return redirect('/admin/transaksi/');
        }
    }

    public function kasir()
    {
        return view('admin.pages.transaksi.kasir.data');
    }
}
