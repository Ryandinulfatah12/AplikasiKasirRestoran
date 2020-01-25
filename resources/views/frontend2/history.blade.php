@extends('layouts.main2')
@section('title','History Order')
@section('content')

<div class="container">
	<h1 class="text-center mt-4 mb-4">Riwayat Semua Data Order User Ini</h1>

	<div class="col-lg-9 mx-auto">
		<div id="card" class="card mb-3">
		  @foreach($orders as $order)
		  <div class="card-header">
		   	<b>{{$order->kode_order}} - No Meja {{$order->no_meja}}</b>
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
		    <strong class="float-right" style="text-transform: uppercase; color: green;">Total : Rp.{{number_format($order->subtotal,0,',','.')}},</strong><span class="badge badge-dark">Diorder pada : {{date('d F Y - H:i', strtotime($order->created_at))}}</span> <span class="badge badge-secondary">Status	:
            <?php 
		            if ($order['status_order']=='Pending') {
		                echo "<span class='badge badge-warning text-dark'>SEDANG DIPROSES</span>";
		            } elseif($order['status_order']=='Menunggu Pembayaran') {
		            	echo "<span class='badge badge-warning'>SEDANG DIPROSES | Menunggu Pembayaran</span>";
		            } elseif($order['status_order']=='Beres') {
		            	echo "<span class='badge badge-success'>ORDERAN BERES</span>";
		            } else {
		            	echo "<span class='badge badge-danger'>DIBATALKAN</span>";
		            }
		     		?></span>
		  </div>
		  @endforeach
		</div>
	</div>
	
</div>

@endsection

@push('js')
<script src="{{url('polished/js/moment.min.js')}}"></script>
<script>
	moment().format();
</script>
@endpush