@extends('admin.main')
@section('title','Tambah Data Kategori')

@section('content')
<div class="container-fluid">
	<h1>Tambah Data Kategori</h1>

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

	<div class="row">
		<div class="col-md-6">
			<form method="POST" action="{{ route('admin.masakan.kategori.add') }}">
				@csrf
				<div class="card">
					<div class="card-body">
						<div class="form-group form-label-group">
							<label for="iKategori">Kategori</label>
							<input type="text" name="nama_kategori"
							class="form-control {{ $errors->has('nama_kategori')?'is-invalid':'' }} "
							value="{{ old('nama_kategori') }}"
							id="iKategori" placeholder="Nama Kategori" required autofocus>
							@if($errors->has('nama_kategori'))
							<div class="invalid-feedback">{{ $errors->first('nama_kategori') }}</div>
							@endif
						</div><!--End Form Group-->

					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Simpan</button><!--End Card footer-->
					</div>

				</div><!--End Card-->
			</form>
		</div>
	</div>

  
</div>
@endsection