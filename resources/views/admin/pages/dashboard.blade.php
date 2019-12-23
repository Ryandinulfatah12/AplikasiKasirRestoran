@extends('admin.main')
@section('title','Dashboard')
@section('content')

<div class="main-content"> 

	<div class="container-fluid">

		<h1>Selamat Datang Di Restoran Kami...</h1>
		<div class="alert alert-success" role="alert">
		  <h4 class="alert-heading">Hai! <b>{{Auth::user()->fullname}}</b> Anda masuk Sebagai <u>{{Auth::user()->level}}</u></h4>
		</div> 

		<!-- OVERVIEW -->
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Statistik</h3>
				<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<?php 
							$data = App\Order::all();
						?>
						<div class="metric">
							<span class="icon"><i class="lnr lnr-envelope"></i></span>
							<p>
								<span class="number">{{$data->count()}}</span>
								<span class="title">Pesanan</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<?php 
							$data = App\Transaksi::all();
						?>
						<div class="metric">
							<span class="icon"><i class="fa fa-money" aria-hidden="true"></i></span>
							<p>
								<span class="number">{{$data->count()}}</span>
								<span class="title">Transaksi</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<?php
							$data = App\Masakan::all();
						?>
						<div class="metric">
							<span class="icon"><i class="lnr lnr-dinner"></i></span>
							<p>
								<span class="number">{{$data->count()}}</span>
								<span class="title">Masakan</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<?php
							$data = App\User::all();
						?>
						<div class="metric">
							<span class="icon"><i class="lnr lnr-users"></i></span>
							<p>
								<span class="number">{{$data->count()}}</span>
								<span class="title">User Registered</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END OVERVIEW -->
	</div>
</div>
<!-- END MAIN CONTENT -->



@endsection