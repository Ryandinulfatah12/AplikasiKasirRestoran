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
		<div class="col-sm-6 col-md-3">
			<div class="card-group">
			  <div class="card">
			    <img class="card-img-top" src="{{url('storage/gambar/'.$dt->gambar)}}" width="50px" alt="Card image cap">
			    <div class="card-body">
			      <small>{{$dt->kode_masakan}}</small>	
			      <h5 class="card-title">{{$dt->nama_masakan}}</h5>
			      <p class="card-text">Rp.{{number_format($dt->harga,0,',','.')}},</p>
			    </div>
			    <div class="card-footer">
			      <a href="{{route('add.cart', ['id' => $dt->id])}}" class="btn btn-success">Add to Cart</a>
			    </div>
			  </div>
			</div>
		</div>
		@endforeach
	</div>
	

	

</div>

@endsection