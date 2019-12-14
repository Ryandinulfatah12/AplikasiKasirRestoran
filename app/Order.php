<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id_order';

    protected $fillable = ['id_order','kode_order','no_meja','tanggal','id_user','keterangan','status_order'];

    public static function getId()
    {
    	return $getId = DB::table('orders')->orderBy('id_order','DESC')->take(1)->get();
    }

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
    	if ($oldCart) {
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add($item, $id)
    {
    	$storedItem = ['qty' => 0, 'harga' => $item->harga, 'item' => $item];
    	if ($this->items) {
    		if (array_key_exists($id, $this->items)) {
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['harga'] = $item->harga * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
    	$this->totalPrice += $item->harga;
    }
}
