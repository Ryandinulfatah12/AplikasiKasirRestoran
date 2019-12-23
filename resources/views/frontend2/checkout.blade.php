@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-offset-4 col-sm-offset-3">
			<h1>Checkout</h1>
			<h4 style="color: green;">Your Invoice : Rp.{{number_format($total,0,',','.')}},</h4>
			
			<form action="{{route('postcheckout')}}" method="POST">
				@csrf
				<input type="hidden" value="1" name="id_order">
				<input type="hidden" value="4" name="id_masakan">
				<input type="hidden" value="Belum Beres" name="status_detail_order">
				<button type="submit" >Cekot</button>
			</form>
		</div>
	</div>
</div>

@endsection