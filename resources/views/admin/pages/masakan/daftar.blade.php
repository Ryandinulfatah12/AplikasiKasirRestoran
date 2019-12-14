@extends('admin.main')
@section('title','Daftar Masakan')
@section('content')

	<div class="container-fluid">
		<h1>Daftar Masakan</h1>
		<hr>


		<!-- @if(session('result') == 'delete')
		<div class="alert alert-success data-dismissible" role="alert">
		  <h4 class="alert-heading">Terhapus!</h4>Data Berhasil Dihapus dari Database.
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		</div>
		@endif -->
		
		<div class="row">
			<div class="col-md-6 mb-3">
				<a href="{{ route('admin.masakan.add') }}" class="btn btn-primary">[+] Tambah</a>
			</div>

			<div class="col-md-6 mb-3">
				<form method="GET" action="{{ route('admin.masakan') }}">
					@csrf
					<div class="input-group">
						<input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari Sesuatu...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Cari</button></span>
					</div>
				</form>
			</div>
		</div>

		<table class="table table-stripped mb-3">
			<tr>
				<tr>
					<th>#</th>
					<th>Gambar</th>
					<th>Produk</th>
					<th>&nbsp;</th>
				</tr>
			</tr>
			@foreach($data as $dt)
			<!-- kolom data gambar -->
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>
					<img src="{{url('storage/gambar/'.$dt->gambar)}}" width="75px">
				</td>
			
				<!-- kolom data produk -->
				<td>
					<small class="text-muted">{{$dt->kode_masakan}}</small><br>
					<strong>{{$dt->nama_masakan}}</strong>,
					Harga Rp.{{number_format($dt->harga,0,',','.')}}, 
					Stok <?php 
		            if ($dt['status_masakan']=='Ada') {
		                echo "<span class='label label-success'>Ada</span>";
		            } else {
		                echo "<span class='label label-danger'>Habis</span>";
		            }
		     		?>
					<br>
					<small class="text-muted">{{$dt->nama_kategori}}</small>
				</td>

			<!-- kolom data produk -->
			<td>
				<!-- kolom edit -->
				<a href="{{ route('admin.masakan.edit', ['id'=>$dt->id]) }}" class="btn btn-success btn-sm">
		          	<i class="fa fa-w fa-edit"></i>
		          </a>

				<!-- kolom edit gambar -->
				<!-- <button class="btn btn-info btn-sm"
		          data-id="{{ $dt->id }}"
		          type="button" data-toggle="modal" data-target="#UbahGambarModal">
		          	<i class="fa fa-picture-o" aria-hidden="true"></i>
		          </button> -->

				<!-- kolom hapus -->
		          <button class="btn btn-danger btn-sm btn-trash"
		          data-id="{{ $dt->id }}"
		          type="button">
		          	<i class="fa fa-w fa-trash"></i>
		          </button>
			</td>
			</tr>
			@endforeach
		</table>

	</div>

	@endsection


<!-- START MODAL HAPUS -->
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
					<form id="form-delete" action="{{ route('admin.masakan') }}" method="post" >
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
<!-- END MODAL HAPUS -->
