@extends('admin.main')
@section('title','User')
@Section('content')

<div class="container">
	<h1>User</h1>
	<hr>
	
	@if(session('result') == 'delete')
	<div class="alert alert-success data-dismissible" role="alert">
	  <h4 class="alert-heading">Terhapus!</h4>Data Berhasil Dihapus dari Database.
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	</div>
	@endif

	<div class="row">
		<div class="col-md-6 mb-3">
			<a href="{{ route('admin.user.add') }}" class="btn btn-primary">[+] Tambah</a>
		</div>

		<div class="col-md-6 mb-3">
			<form method="GET" action="{{ route('admin.user') }}">
				@csrf
				<div class="input-group">
					<input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari Sesuatu...">
					<span class="input-group-btn"><button type="button" class="btn btn-primary">Cari</button></span>
				</div>
			</form>
		</div>
	</div>


	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nama</th>
	      <th scope="col">Username</th>
	      <th scope="col">Email</th>
	      <th scope="col">Hak Akses</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach($data as $dt)
	    <tr>
	      <th scope="row">{{$loop->iteration}}</th>
	      <td>{{$dt->fullname}}</td>
	      <td>{{$dt->username}}</td>
	      <td>{{$dt->email}}</td>
	      <td>{{$dt->level}}</td>

	      <td>
	          <a href="{{ route('admin.user.edit', ['id'=>$dt->id]) }}" class="btn btn-success btn-sm">
	          	<i class="fa fa-w fa-edit"></i>
	          </a>

	          @if($dt->id != Auth::id() )
	          <button class="btn btn-danger btn-sm btn-trash"
	          data-id="{{ $dt->id }}"
	          type="button">
	          	<i class="fa fa-w fa-trash"></i>
	          </button>
	          @endif
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>

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
				Apakah Anda Yakin mau Menghapus Data ini dari Database?
				<form id="form-delete" action="{{ route('admin.user') }}" method="post" >
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