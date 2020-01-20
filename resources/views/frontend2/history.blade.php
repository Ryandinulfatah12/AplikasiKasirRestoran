@extends('layouts.main2')
@section('title','History Order')
@section('content')

<div class="container">
	<h1 class="text-center mt-4 mb-4">Riwayat Semua Data Order User Ini</h1>

	<div class="col-lg-9 mx-auto">
		<div class="card mb-3">
		  @foreach($orders as $order)
		  <div class="card-header bg-dark text-white">
		    Orderan ke {{$loop->iteration}} | {{$order->kode_order}}
		  </div>
		  <div class="card-body">
		    <ul class="list-group list-group-flush">
				@foreach($order->cart->items as $item)
			    <li class="list-group-item">
			    	<span class="badge badge-dark float-right">Rp.{{number_format($item['harga'],0,',','.')}},</span>
			    	{{$item['item']['nama_masakan']}}<span class="badge badge-warning float-right">{{$item['qty']}} Qty</span> 
			    </li>
				@endforeach
			 </ul>
		  </div>
		  <div class="card-footer mb-4">
		    <strong class="float-right" style="text-transform: uppercase; color: green;">Total : Rp.{{number_format($order->cart->totalPrice,0,',','.')}},</strong><span class="badge badge-dark">Diorder pada : {{$order->created_at}}</span> <span class="badge badge-secondary">Status	: {{$order->status_order}}</span>
		  </div>
		  @endforeach
		</div>
	</div>
	
</div>

@endsection