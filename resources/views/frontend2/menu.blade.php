@extends('layouts.main2')
@section('title','Daftar Menu Masakan')
@section('content')

<div class="container">
	<h1>Daftar Menu Masakan</h1>

	<div class="col-md-6 mb-3">
      <form method="GET" action="{{ route('menu-masakan') }}">
        @csrf
        <div class="input-group">
          <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari Sesuatu..." id="keyword" autofocus>
          <span class="input-group-btn"><button type="button" name="cari" class="btn btn-success" autofocus>Cari</button></span>
        </div>
      </form>
    </div>

    <div class="row">
    	<?php
    	 $kategori = App\Kategori::get();
    	  ?>
    	<div class="btn-group" role="group">
		    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      Tampilkan Menurut Kategori
		    </button> 
		    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
		      <a class="btn btn-primary btn-block" href="{{route('menu-masakan')}}">Semua Masakan</a>
		      @foreach($kategori as $dt)
		      <a href="{{route('show.category', ['id'=> $dt->id])}}" class="btn btn-primary btn-block">{{$dt->nama_kategori}}</a>
		      @endforeach
		    </div>

		 </div>
    </div>

    @if(session('result') == 'success')
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong>1 Item Ditambahkan!</strong> Anda Telah Menambahkan Item Ke Keranjang Anda. <strong>Ayo Pesan Lagi.</strong> Atau Mau <span class="oi oi-arrow-thick-right"></span> <a href="{{route('shopping.cart')}}" class="btn btn-success btn-sm"><span class="oi oi-cart"></span> Lihat Keranjang</a>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	@elseif(session('result') == 'clear')
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong>Terhapus!</strong> Anda Telah Menghapus Semua Item Keranjang Anda. <strong>Ayo Silahkan Pesan!</strong>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	@endif
	
	<div class="row">
		@foreach($data as $dt)
		<div class="col-sm-6 col-md-4 pb-4">
			<div class="card-group">
			  <div class="card">
			    <img class="card-img-top img-responsive" src="{{url('storage/gambar/'.$dt->gambar)}}" style="width: 100%; height: 280px;" alt="Card image cap">
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
			      		<a href="{{route('add.cart', ['id' => $dt->id])}}" class="btn btn-success btn-block"><span class="oi oi-cart"></span> Pesan</a>
			        @else
			       		 <button type="button" class="btn btn-secondary btn-block" title="Stok Habis" disabled><span class="oi  oi-circle-x"></span> Stok Habis</button>
			        @endif
			    </div>
			  </div>
			</div>
		</div>
		@endforeach
	</div>

</div>

@endsection