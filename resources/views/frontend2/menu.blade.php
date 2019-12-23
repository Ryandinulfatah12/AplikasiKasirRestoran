@extends('layouts.app')
@section('content')

<div class="container">
	<h1>Daftar Menu Masakan</h1>

	<div class="col-md-6 mb-3">
      <form method="GET" action="{{ route('menu-masakan') }}">
        @csrf
        <div class="input-group">
          <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari Sesuatu..." id="keyword" autofocus>
          <span class="input-group-btn"><button type="button" name="cari" class="btn btn-primary" autofocus>Cari</button></span>
        </div>
      </form>
    </div>
	
	<div class="row">
		@foreach($data as $dt)
		<div class="col-sm-6 col-md-4">
			<div class="card-group" id="table">
			  <div class="card">
			    <img class="card-img-top" src="{{url('storage/gambar/'.$dt->gambar)}}" style="width: 100%; height: 50%;" alt="Card image cap">
			    <div class="card-body">
			      <small>{{$dt->kode_masakan}} | {{$dt->nama_kategori}}</small>	
			      <h5 class="card-title">{{$dt->nama_masakan}}</h5>
			      <p>
			      	<?php 
		            if ($dt['status_masakan']=='Ada') {
		                echo "<span class='badge badge-success'>Ada</span>";
		            } else {
		                echo "<span class='badge badge-danger'>Habis</span>";
		            }
		     		?>
			      </p>
			      <p class="card-text">Rp.{{number_format($dt->harga,0,',','.')}},</p>
			    </div>
			    <div class="card-footer">
			    	@if($dt['status_masakan']=='Ada')
			      		<a href="{{route('add.cart', ['id' => $dt->id])}}" class="btn btn-success btn-toastr btn-block" data-context="info" data-message="Ditambahkan ke Cart" data-position="top-right"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</a>
			        @else
			       		<button type="button" class="btn btn-secondary btn-block" title="Stok Habis" disabled><i class="fa fa-times-circle-o" aria-hidden="true"></i> Add to Cart</button>
			        @endif
			    </div>
			  </div>
			</div>
		</div>
		@endforeach
	</div>

</div>

@endsection