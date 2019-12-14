@extends('admin.main')
@section('title','Daftar Kategori')
@section('content')

<div class="container-fluid">
	<h1>Daftar Kategori</h1>
	<hr>
	
	@if(session('result') == 'delete')
	<div class="alert alert-success data-dismissible" role="alert">
	  <h4 class="alert-heading">Terhapus!</h4>Data Berhasil Dihapus dari Database.
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
	@endif

	<div class="row">
		<div class="col-md-6 mb-3">
			<a href="{{route('admin.masakan.kategori.add')}}" class="btn btn-primary">[+] Tambah</a>
		</div>

		<div class="col-md-6 mb-3">
			<form method="GET" action="{{ route('admin.masakan.kategori') }}">
				@csrf
				<div class="input-group">
					<input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari Sesuatu..." id="keyword" autofocus>
					<span class="input-group-btn"><button type="button" name="cari" class="btn btn-primary">Cari</button></span>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Kategori</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($data as $dt)
			    <tr>
			      <th scope="row">{{$loop->iteration}}</th>
			      <td>{{$dt->nama_kategori}}</td>

			      <td>
			          <a href="{{route('admin.masakan.kategori.edit', ['id'=>$dt->id])}}" class="btn btn-success btn-sm">
			          	<i class="fa fa-w fa-edit"></i>
			          </a>

			          <button class="btn btn-danger btn-sm btn-trash"
			          data-id="{{ $dt->id }}"
			          type="button">
			          	<i class="fa fa-w fa-trash"></i>
			          </button>
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>

	{{

		$data->appends(request()->only('keyword'))
		->links('vendor.pagination.bootstrap-4')
	}}

</div>

@endsection

@push('modal')

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Hapus Data Ini?</h3>
				<button class="close" type="button" data-dismiss="modal">
					<span>x</span>
				</button>
			</div>
			
			<div class="modal-body">
				Data Tidak Bisa Dikembalikan setelah Terhapus,Anda Yakin?
				<form id="form-delete" action="{{ route('admin.masakan.kategori') }}" method="post" >
					@method('delete')
					@csrf
					<input type="hidden" name="id" id="input-id">
				</form>
			</div>

			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-danger btn-delete" type="button">Hapus</button>
			</div>

		</div>
	</div>
</div>

@endpush

@push('js')

<script type="text/javascript">
	$(function() {
		$('.btn-trash').click(function() {
			id = $(this).attr('data-id');
			$('#input-id').val(id);
			$('#deleteModal').modal('show');
		});

		$('.btn-delete').click(function() {
			$('#form-delete').submit();
		});

	})
</script>

@endpush