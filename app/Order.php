<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';

    protected $fillable = ['kode_order','no_meja','id_user','keterangan','status_order'];

    public static function getId()
    {
    	return $getId = DB::table('orders')->orderBy('id_order','DESC')->take(1)->get();
    }

    public static function arrayCart(Request $req)
    {
        $orders = Order::where('id_order', $req->id_order)->get();
        $orders->transform(function($order)
        {
            $order->cart = unserialize($order->cart);
            return $order;
        });
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // public function masakan()
    // {
    //     return $this->belongsToMany(Masakan::class)->withPivot(['subtotal']);
    // }

    
}
