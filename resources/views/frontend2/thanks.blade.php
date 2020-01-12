@extends('layouts.main2')
@section('title','Terima Kasih')
@section('content')

<div class="col-7 pt-5 mx-auto">
	@if(session('result') == 'success')
	<div class="alert alert-success" role="alert">
	  <h4 class="alert-heading">Berhasil Memesan!</h4>Pesanan Anda Akan Diproses Sebentar Lagi.
	  <a href="" target="_blank" class="btn btn-success btn-lg"><span class="oi oi-print"></span> Cetak</a>
	</div>
	@endif
	<h1>Pesanan anda sedang Diproses...<span class="oi oi-loop-circular mt-4 fs-9 spin"></span></h1>
	<div class="card border-secondary text-dark shadow-sm">
	  <div class="card-header bg-secondary">
	    <span class="btn p-0" data-toggle="collapse" data-target="#collapsible-card-2">
	      Terimakasih telah memesan...silahkan menuju kasir untuk melakukan Pembayaran
	    </span>
	  </div>
	  <div class="collapse" id="collapsible-card-2">
	    <div class="card-body bg-secondary-lighter">
	      Woooow you expand me. Great job! <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam optio non asperiores reiciendis libero voluptatum eum illum, distinctio omnis, quo, illo cupiditate, sequi laudantium quasi repudiandae in iure sint! Laboriosam.</div>
	      <div>Maiores natus animi nemo dolorem iste vitae laudantium suscipit omnis voluptatum officiis ratione accusantium aut, modi, in asperiores reprehenderit assumenda quisquam. Repellendus voluptatibus nam officia quam autem vero similique iusto.</div>
	    </div>
	  </div>
	</div>
</div>

@endsection