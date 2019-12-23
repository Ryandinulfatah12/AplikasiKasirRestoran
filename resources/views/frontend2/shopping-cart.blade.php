@extends('layouts.app')
@section('content')

<div class="container">
	<h1>Keranjang</h1>
	
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-md-9">
				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nama Masakan</th>
				      <th scope="col">Jumlah Pesanan</th>
				      <th scope="col">Harga</th>
				      <th scope="col">&nbsp;</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($data as $dt)
				    <tr>
				      <th scope="row">{{$loop->iteration}}</th>
				      <td>{{$dt['item']['nama_masakan']}}</td>
				      <td><span class="badge badge-primary">{{$dt['qty']}}</span></td>
				      <td>Rp.{{number_format($dt['harga'],0,',','.')}},</td>
				      <td>
				      	<a class="btn btn-success" href="{{route('addone', ['id' => $dt['item']['id']])}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
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

				<strong style="color: green;">Total : Rp.{{number_format($totalPrice,0,',','.')}},</strong>
			 </div>	

			 <form action="{{route('postcart')}}" method="POST">
			 	@csrf
				  <div class="form-group">
				    <label for="no_meja">No Meja</label>
				    <input type="number" class="form-control" name="no_meja" placeholder="Konfirmasi Nomor Meja">
				  </div>
				  
				  <div class="form-group">
				    <label for="Keterangan">Keterangan</label>
				    <textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan"></textarea>
				  </div>

				  <input type="hidden" name="status_order" value="Menunggu">
				  <input type="hidden" name="id_user" value="{{Auth::user()->id}}">

				  <button type="submit" class="btn btn-success"><i class="lnr lnr-cart"></i> Lanjut Bayar</button>
			 </form>
					
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