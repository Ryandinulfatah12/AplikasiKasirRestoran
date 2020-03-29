@extends('layouts.main2')
@section('title','Daftar Menu Masakan')
<style>
	.img-fluid{
		filter: brightness(50%);
		object-fit: cover;
	}

	.carousel-caption {
		top: 0px;
		text-shadow: 1px 1px black;
	}

	.container {
		background: #fff;
		border-radius: 20px;
		position: relative;
		top: -150px;
		box-shadow: 0 3px 20px rgba(0,0,0,0.5);
		
	}

</style>
@section('content')

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="img-fluid d-block w-100 h-50" src="{{url('polished/assets/bg2.png')}}" alt="First slide">
      <div class="carousel-caption">
	    <h1 class="mt-5"><?php 
	          date_default_timezone_set("Asia/Jakarta");

	            $b = time();
	            $hour = date("G",$b);

	            if ($hour>=0 && $hour<=11)
	            {
	            echo "Selamat Pagi";
	            }
	            elseif ($hour >=12 && $hour<=14)
	            {
	            echo "Selamat Siang";
	            }
	            elseif ($hour >=15 && $hour<=17)
	            {
	            echo "Selamat Sore";
	            }
	            elseif ($hour >=17 && $hour<=18)
	            {
	            echo "Selamat Petang";
	            }
	            elseif ($hour >=19 && $hour<=23)
	            {
	            echo "Selamat Malam";
	            }

	       ?>, {{Auth::user()->fullname}}
	    </h1>
	  </div>
    </div>
  </div>
</div>

<div class="container" id="menu">

	<h2>Daftar Menu Masakan</h2>

	<div class="row mb-4">
		<div class="col-md-7">
			<form method="GET" action="{{ route('menu-masakan') }}">
	        @csrf
	        <div class="input-group">
	          <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control border-success" placeholder="Cari Sesuatu..." id="keyword" autofocus>
	          <button type="submit" class="btn btn-success">Cari</button>
	        </div>
	      </form>
		</div>

		<div class="col-md-5">
	      <div class="float-right">
		      	<?php
		    	 $kategori = App\Kategori::get();
		    	  ?>

				<div class="btn-group dropleft">
				  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Filter by Kategori
				  </button>
				    <div class="dropdown-menu">
				    	<a class="dropdown-item" href="{{route('menu-masakan')}}">Semua Menu</a>
				    @foreach($kategori as $dt)
					  <a class="dropdown-item" href="{{route('show.category', ['id'=> $dt->id])}}">{{$dt->nama_kategori}}</a>
					@endforeach  
					</div>
				</div>

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

	@if($data->isEmpty())
	<div class="col">
		<h4 class="text-center text-muted">Menu tidak tersedia...</h4>
	</div>
	@else
	<div class="row">
		@foreach($data as $dt)
		<div class="col-md-4 pb-4">
			<div class="card-group">
			  <div class="card">
			    <a href="{{url('storage/gambar/'.$dt->gambar)}}"><img class="card-img-top img-responsive" src="{{url('storage/gambar/'.$dt->gambar)}}" style="width: 100%; height: 280px;" alt="Card image cap"></a>
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
	@endif

	{{
		$data->appends(request()->only('keyword'))
		->links('vendor.pagination.bootstrap-4')
	}}
	<br>

</div>


@endsection

@push('js')
<script type="text/javascript">
	$(function () {
		var current = window.location.href;
		$('.dropdown-item').each(function(){
			var $this = $(this);
			if ($this.attr('href') == current ) {
				$(this).addClass('active');
			}
		});
	});
</script>
@endpush