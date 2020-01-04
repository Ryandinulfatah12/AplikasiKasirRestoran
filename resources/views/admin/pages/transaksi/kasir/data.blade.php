@extends('admin.main2')
@section('title','Cashier')

@section('content')

<div class="container">
	<h1>Cashier</h1>

	<div class="col-lg-12">

          <div class="row h-100">

            <div class="col-lg-6">
             <div class="greeting mt-4 pl-4">	              
				<?php 
				$orders = App\Order::where('status_order','Menunggu Pembayaran')->get();
				  ?>

				<div class="btn-group" role="group">
					<button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Tampilkan Order Tersedia
					</button>
					<div class="dropdown-menu" aria-labelledBy="btnGroupDrop1">
						@foreach($orders as $order)
						<a href="{{route('payment', ['id_order'=>$order->id_order])}}" class="btn btn-secondary btn-block">Kode Pesanan {{$order->kode_order}} | No Meja {{$order->no_meja}}</a>
						@endforeach
					</div>
				</div>
             </div>

            </div>

          </div>
          
        </div>
	

</div>

@endsection