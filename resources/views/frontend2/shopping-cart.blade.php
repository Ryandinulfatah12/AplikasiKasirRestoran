@extends('layouts.app')
@section('content')

<div class="container">
	<h1>Keranjang</h1>
	
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
				<ul class="list-group">
					@foreach($data as $dt)
						<li class="list-group-item">
							<span class="badge badge-primary">{{$dt['qty']}}</span>
							<strong>{{$dt['item']['nama_masakan']}}</strong>
							<span class="label label-success">Rp. {{$dt['harga']}},</span>
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="#">Reduce By 1</a></li>
								<li><a href="#">Reduce All</a></li>
							</ul>
						</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
				<strong>Total : Rp. {{$totalPrice}},</strong>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
				<button type="submit" class="btn btn-success">Checkout</button>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
				<strong>Tidak Ada Pesanan Dikeranjang :(</strong>
			</div>
		</div>
	@endif
</div>

@endsection