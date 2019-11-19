<?php

namespace App\Http\Controllers;
use App\Masakan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasakanController extends Controller
{
    public function daftar(Request $req)
    {
    	$data = Masakan::where('nama_masakan','like',"%{$req->keyword}%")->paginate(10);
    	return view('admin.pages.masakan.daftar', ['data'=>$data]);
    }

     public function add()
    {
    	return view('admin.pages.masakan.add');
    }

    public function save(Request $req)
    {
    	\Validator::make($req->all(), [
    		'nama_masakan'=>'required|between:3,100',
    		'harga'=>'required',
    		'status_masakan'=>'required',
    	])->validate();

    	$result = new Masakan;
    	$result->nama_masakan = $req->nama_masakan;
        $result->harga = $req->harga;
    	$result->status_masakan = $req->status_masakan;

    	if ($result->save()) {
    		return back()->with('result','success');
    	} else {
    		return back()->with('result','fail');
    	}
    	
    }

    public function edit($id)
    {
        $data = Masakan::where('id',$id)->first();
        return view('admin.pages.masakan.edit', ['rc'=>$data]);
    }

    public function update (Request $req)
    {
        \Validator::make($req->all(), [
            'nama_masakan'=>'required',
            'harga'=>'required',
            'status_masakan'=>'required',
        ])->validate();

        $field = [
                'nama_masakan'=>$req->nama_masakan,
                'harga'=>$req->harga,
                'status_masakan'=>$req->status_masakan,
            ];

        $result = Masakan::where('id',$req->id)->update($field);

        if ($result) {
            return back()->with('result','success');
        } else {
            return back()->with('result','fail');
        }
    }


    public function delete(Request $req)
    {
        $result = Masakan::find($req->id);

        if ($result->delete() ){
            return back()->with('result','delete');
        }
        
    }


}
