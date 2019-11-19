@extends('admin.main')
@section('title','Edit Data Masakan')

@section('content')
<div class="container">

	<h1>Edit Data Masakan</h1>
	<hr>

	@if(session('result') == 'success')
	<div class="alert alert-success data-dismissible" role="alert">
	  <h4 class="alert-heading">Terupdate!</h4>Data Berhasil Diupdate.
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
	
	@elseif(session('result') == 'fail')
	<div class="alert alert-danger data-dismissible" role="alert">
	  <h4 class="alert-heading">Ups!</h4>Ada Kesalahan Saat Menginputkan Data, Silahkan Check Kembali.
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
	@endif

	<form method="POST" action="{{ route('admin.masakan.edit', ['id'=>$rc->id]) }}">
		@csrf
		<div class="card">
			<div class="card-body">
				<div class="form-group form-label-group">
					<label for="iNamaMasakan">Nama Masakan</label>
					<input type="text" name="nama_masakan"
					class="form-control {{ $errors->has('nama_masakan')?'is-invalid':'' }} "
					value="{{ old('nama_masakan',$rc->nama_masakan) }}"
					id="iNamaMasakan" placeholder="Nama Masakan" required>
					@if($errors->has('nama_masakan'))
					<div class="invalid-feedback">{{ $errors->first('nama_masakan') }}</div>
					@endif
				</div><!--End Form Group-->

				<div class="form-group form-label-group">
					<label for="iHarga">Harga</label>
					<input type="text" name="harga"
					class="form-control {{ $errors->has('harga')?'is-invalid':'' }} "
					value="{{ old('harga',$rc->harga) }}"
					id="iHarga" placeholder="Harga" required>
					@if($errors->has('harga'))
					<div class="invalid-feedback">{{ $errors->first('harga') }}</div>
					@endif
				</div><!--End Form Group-->

				<div class="form-group form-label-group">
					<?php 
						$val = old('status_masakan',$rc->status_masakan);
					 ?>
					<select name="status_masakan" class="form-control {{ $errors->has('status_masakan')?'is-invalid':'' }}" required>
						<option value="" {{ $val==""?'selected':'' }}>Status Masakan :</option>
						<option value="Ada" {{ $val=="Ada"?'selected':'' }}>Ada</option>
						<option value="Habis" {{ $val=="Habis"?'selected':'' }}>Habis</option>
					</select>
					@if($errors->has('status_masakan'))
					<div class="invalid-feedback">{{$errors->first('status_masakan')}}</div>
					@endif
				</div><!--End Form Group-->

			</div><!--End Card body-->

			<div class="card-footer">
				<button class="btn btn-primary" type="submit">Simpan</button><!--End Card footer-->
			</div>

		</div><!--End Card-->
	</form>
</div>
@endsection