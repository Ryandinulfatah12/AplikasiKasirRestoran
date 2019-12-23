<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_order';
    protected $guarded = ['id','created_at','updated_at'];

    public function masakan()
    {
    	$this->belongsTo('App\Masakan');
    }

    public function order()
    {
    	$this->belongsTo('App\Order');
    }
}
