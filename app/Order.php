<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';

    protected $fillable = ['id_order','kode_order','no_meja','id_user','keterangan','status_order'];

    public static function getId()
    {
    	return $getId = DB::table('orders')->orderBy('id_order','DESC')->take(1)->get();
    }

    public function user()
    {
    	return $this->hasMany('App\User');
    }

    
}
