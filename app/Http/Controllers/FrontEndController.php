<?php

namespace App\Http\Controllers;

use App\Masakan;
use App\Cart;
use App\Order;
use App\DetailOrder;
use App\Kategori;
use Auth;

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
            ->orWhere('nama_masakan','like',"%{$req->keyword}%")
            ->orWhere('kategori.id', $req->id)
            ->select('masakan.*','nama_kategori')
            ->orderBy('updated_at','desc')
            ->paginate(10);
            return view('frontend2.menu', ['data'=>$data]);
    }

    public function AddToCart(Request $req, $id)
    {
        $data = Masakan::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($data, $data->id);

        $req->session()->put('cart', $cart);
        //return json_encode($req->session()->get('cart'));

        return redirect()->route('menu-masakan');
        
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('shopping.cart');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('shopping.cart');
    }

    public function getAddOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addOne($id);

        Session::put('cart', $cart);
        return redirect()->route('shopping.cart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('frontend2.shopping-cart');
        }   
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend2.shopping-cart', ['data' => $cart->items, 'totalPrice'=>$cart->totalPrice]);
        //return response()->json(['data' => $cart->items, 'totalPrice'=>$cart->totalPrice]);
        
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('frontend2.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('frontend2.checkout', ['data' => $cart->items, 'total' => $total]);
    }

    public function postCart(Request $req)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shopping-cart');
        }



        //Ambil ID Terakhir
        $id = Order::getId();
        foreach ($id as $value);
        $idLama = $value->id_order;
        $idBaru = $idLama + 1;
        $blt = date('mY');

        $kode_ord = 'ORD'.$blt.$idBaru;

        try {
            $result = new Order;
            $result->kode_order = $kode_ord.sprintf("%02s", $req->kode_order);
            $result->no_meja = $req->no_meja;
            $result->id_user = $req->id_user;
            $result->keterangan = $req->keterangan;
            $result->status_order = $req->status_order;

            $result->save();
            return redirect()->route('checkout');
        } catch (Exception $e) {
             return redirect()->route('checkout');
        }

    }

    public function postCheckout(Request $req)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shopping.cart');
        }

        $oldCart = Session::get('cart');


        try {
            $result = new DetailOrder;
            $result->id_order = $req->id_order;
            $result->id_masakan = $req->id_masakan;
            $result->status_detail_order = $req->status_detail_order;

            return $result;
        } catch (Exception $e) {
            
        }

        Session::forget('cart');


    }
}
