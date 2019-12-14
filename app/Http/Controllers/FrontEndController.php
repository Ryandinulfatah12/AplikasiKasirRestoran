<?php

namespace App\Http\Controllers;

use App\Masakan;
use App\Order;

use Session;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
    	return view('frontend2.menu');
    }

    public function menu(Request $req)
    {
    	$data = Masakan::join('kategori','kategori.id','masakan.kategori_id')
            ->where('nama_masakan','like',"%{$req->keyword}%")
            ->select('masakan.*','nama_kategori')
            ->orderBy('updated_at','desc')
            ->paginate(10);
            return view('frontend2.menu', ['data'=>$data]);
    }

    public function AddToCart(Request $req, $id)
    {
        $data = Masakan::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Order($oldCart);
        $cart->add($data, $data->id);

        $req->session()->put('cart', $cart);
        return redirect()->route('menu-masakan');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('frontend2.shopping-cart');
        }   
        $oldCart = Session::get('cart');
        $cart = new Order($oldCart);
        return view('frontend2.shopping-cart', ['data' => $cart->items, 'totalPrice'=>$cart->totalPrice]);
        
    }
}
