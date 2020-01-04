@extends('layouts.main2')
@section('title','Checkout')
@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-6 pt-4 mx-auto">
			<form method="POST" action="{{route('postcheckout')}}">
				@csrf
				<div class="card">
					<div class="card-header bg-info pb-1">
			        	<h5 class="text-light"><span  class="oi oi-cart"></span> Verifikasi Nomor Meja</h5>
			   		</div>
					<div class="card-body">
						<div class="form-group form-label-group">
							<label for="">Nomor Meja Anda</label>
							<input type="number" name="no_meja"
							class="form-control {{ $errors->has('no_meja')?'is-invalid':'' }} "
							value="{{ old('no_meja') }}"
							id="" placeholder="Masukan Nomor Meja Anda" required autofocus>
							@if($errors->has('no_meja'))
							<div class="invalid-feedback">{{ $errors->first('no_meja') }}</div>
							@endif
						</div><!--End Form Group-->

						<div class="form-group form-label-group">
							<label for="">Keterangan</label>
							<textarea  name="keterangan"
							class="form-control {{ $errors->has('keterangan')?'is-invalid':'' }} "
							value="{{ old('keterangan') }}"
							id="" placeholder="Keterangan Order Anda" required autofocus></textarea>
							@if($errors->has('keterangan'))
							<div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
							@endif
						</div><!--End Form Group-->
						<small class="text-muted"></small>

						<input type="hidden" name="id_user" value="{{Auth::user()->id}}">
						<input type="hidden" value="Pending" name="status_order">
					</div>	

					<div class="card-footer">
						<button class="btn btn-info" type="submit">Simpan</button><!--End Card footer-->
					</div>

				</div><!--End Card-->
			</form>
		</div>
	</div>
</div>

@endsection