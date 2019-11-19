@extends('admin.main')
@section('title','Tambah Data Masakan')

@section('content')

	<div class="container">

		<h1>Tambah Data Masakan</h1>
		<hr>

		@if(session('result') == 'success')
		<div class="alert alert-success data-dismissible" role="alert">
		  <h4 class="alert-heading">Berhasil!</h4>Data Berhasil Disimpan ke Database.
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		
		@elseif(session('result') == 'fail')
		<div class="alert alert-danger data-dismissible" role="alert">
		  <h4 class="alert-heading">Ups!</h4>Ada Kesalahan, Check Kembali Data Dibawah.
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		@endif

		<form method="POST" action="{{ route('admin.masakan.add') }}">
			@csrf
			<div class="card">
				<div class="card-body">
					<div class="form-group form-label-group">
						<label for="iNamaMasakan">Nama Masakan</label>
						<input type="text" name="nama_masakan"
						class="form-control {{ $errors->has('nama_masakan')?'is-invalid':'' }} "
						value="{{ old('nama_masakan') }}"
						id="iNamaMasakan" placeholder="Nama Masakan" required>
						@if($errors->has('nama_masakan'))
						<div class="invalid-feedback">{{ $errors->first('nama_masakan') }}</div>
						@endif
					</div><!--End Form Group-->

					<div class="form-group form-label-group">
						<label for="iHarga">Harga</label>
						<input type="number" name="harga"
						class="form-control {{ $errors->has('harga')?'is-invalid':'' }} "
						value="{{ old('harga') }}"
						id="iHarga" placeholder="Harga Masakan" required>
						@if($errors->has('harga'))
						<div class="invalid-feedback">{{ $errors->first('harga') }}</div>
						@endif
					</div><!--End Form Group-->

					<div class="form-group form-label-group">
						<select name="status_masakan" class="form-control">
							<option value="">Status Masakan :</option>
							<option value="Ada">Ada</option>
							<option value="Habis">Habis</option>
						</select>
					</div><!--End Form Group-->

				</div><!--End Card body-->

				<div class="card-footer">
					<button class="btn btn-primary" type="submit">Simpan</button><!--End Card footer-->
				</div>

			</div><!--End Card-->
		</form>
	</div>

@endsection