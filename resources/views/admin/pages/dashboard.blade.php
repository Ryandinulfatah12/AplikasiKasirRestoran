@extends('admin.main')
@section('title','Dashboard')
@section('content')

<div class="container">
	<h1>Selamat Datang Di Restoran Kami...</h1>
	<div class="alert alert-success" role="alert">
	  <h4 class="alert-heading">Hai! <b>{{Auth::user()->fullname}}</b> Anda masuk Sebagai <u>{{Auth::user()->level}}</u></h4>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	</div>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quia dignissimos placeat asperiores similique libero explicabo laudantium, ipsum, nihil repellendus error. Repellat iste magnam rerum atque consectetur quidem, sequi aperiam.</p>
</div>



@endsection