@extends('layouts.main2')
@section('title','Keranjang Anda')
@section('content')

<div class="container">
	<h1 align="center"><span class="oi oi-cart"></span> Keranjang</h1>
	
	@if(Session::has('cart'))
	
		<div class="row">

			<div class="col-md-9 mx-auto">
				<a href="{{route('cancel')}}" class="btn btn-danger"><span class="oi oi-trash"></span> Batal Memesan</a><a class="btn btn-success" href="{{route('menu-masakan')}}"><span class="oi oi-arrow-circle-left"></span> Kembali Ke Menu</a>
				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nama Masakan</th>
				      <th scope="col">Harga Satuan</th>
				      <th scope="col">Jumlah Pesanan</th>
				      <th scope="col">Subtotal</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($data as $dt)
				    <tr>
				      <th scope="row">{{$loop->iteration}}</th>
				      <td>{{$dt['item']['nama_masakan']}}</td>
				      <td>Rp.{{number_format($dt['item']['harga'],0,',','.')}},</td>
				      <td><span class="badge badge-warning">{{$dt['qty']}}</span></td>
				      <td>Rp.{{number_format($dt['harga'],0,',','.')}},</td>
				      <td>
				      	<a class="btn btn-success" href="{{route('addone', ['id' => $dt['item']['id']])}}"><i class="oi oi-plus" aria-hidden="true"></i></a>
						<div class="btn-group">
						  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Action
						  </button>
						  <div class="dropdown-menu">
						    <a class="dropdown-item" href="{{route('reducebyone', ['id' => $dt['item']['id']])}}">Reduce By One</a>
						    <a class="dropdown-item" href="{{route('remove.items', ['id' => $dt['item']['id']])}}">Reduce All</a>
						  </div>
						</div>
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>

				<strong class="float-right" style="color: green; text-transform: uppercase;">Total : Rp.{{number_format($totalPrice,0,',','.')}},</strong>
				<br>
				<a href="{{route('checkout')}}" class="btn btn-success float-right"><span class="oi oi-check"></span> Proceed to Checkout</a>
			 </div>	
					
		</div>
	@else
		<div class="row">
			<div class="col-md-7 pt-5">
				<h3>Tidak Ada Pesanan Dikeranjang :(</h3>
				<br>
				<a href="{{route('menu-masakan')}}" class="btn btn-success">Ke Menu Masakan</a>
			</div>
		</div>
	@endif





</div>

@endsection