@extends('layouts.report')
@section('title','Your Delivery')
@section('content')

<div class="row contacts">
	    <div class="col invoice-to">
	        <div class="text-gray-light">INVOICE TO:</div>
	        <h2 class="to">{{$data->fullname}}</h2>
	    </div>
	    <div class="col invoice-details">
	        <h1 class="invoice-id">{{$data->kode_order}}</h1>
	        <div class="date">Date of Invoice: {{$data->created_at}}</div>
	    </div>
	</div>
	
	<div class="thanks">Thank you!</div>
	<div class="notices">
	    <div>NOTICE:</div>
	    <div class="notice">Awoakwaowkawok.</div>
	</div>

@endsection