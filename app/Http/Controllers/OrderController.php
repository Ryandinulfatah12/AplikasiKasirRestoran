<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\DetailOrder;
use Alert;

class OrderController extends Controller
{
    public function data(Request $req) {
    	// 

    	$data = Order::join('users','users.id','orders.id_user')
    		->where('no_meja','like',"%{$req->keyword}%")
            ->select('orders.*', 'fullname')
            ->orderBy('updated_at','desc')
            ->paginate(10);
    		return view('admin.pages.order.data', ['data'=>$data]);
    }

    public function add()
    {
    	return view('admin.pages.order.add');
    }

    public function save(Request $req)
    {
        //Ambil ID Terakhir
        $id = Order::getId();
        foreach ($id as $value);
        $idLama = $value->id_order;
        $idBaru = $idLama + 1;

        $kode_ord = 'ORD'.$idBaru;

        $result = new Order;
        $result->kode_order = $kode_ord.sprintf("%02s", $req->kode_order);
        $result->no_meja = $req->no_meja;
        $result->tanggal = $req->tanggal;
        $result->id_user = $req->id_user;
        $result->keterangan = $req->keterangan;
        $result->status_order = $req->status_order;

        if ($result->save()) {
            alert()->success('Data Berhasil Disimpan ke Database.','Tersimpan!')->autoclose(4000);
            return redirect('/admin/order');
        } else {
            return back()->with('result','fail');
        }
        
    }

    public function edit($id_order)
    {
        $data = Order::where('id_order',$id_order)->first();
        return view('admin.pages.order.edit',['rc'=>$data]);
    }

    public function update (Request $req)
    {
        
        $field = [
                'id_order'=>$req->id_order,
                'no_meja'=>$req->no_meja,
                'tanggal'=>$req->tanggal,
                'id_user'=>$req->id_user,
                'keterangan'=>$req->keterangan,
                'status_order'=>$req->status_order,
            ];

        $result = Order::where('id_order',$req->id_order)->update($field);

        if ($result) {
            alert()->success('Berhasil Mengupdate Data.', 'Terupdate!')->autoclose(4000);
            return redirect('/admin/order');
        } else {
            return back()->with('result','fail');
        }
    }

    public function delete(Request $req)
    {
        $result = Order::find($req->id_order);

        if ($result->delete() ){
            alert()->success('Data Berhasil Terhapus dari Database.', 'Terhapus!')->autoclose(3000);
            return redirect('/admin/order/');
        }
        
    }

    public function detail($id)
    {
        $data = DetailOrder::where('id',$id)->first();
        return view('admin.pages.order.detail',['rc'=>$data]);
    }
}
