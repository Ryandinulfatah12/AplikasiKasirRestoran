@extends('admin.main')
@section('title','Data Order')

@section('content')

<div class="container-fluid">
	<h1>Data Semua Order</h1>
	<hr>

	<div class="row">
		<div class="col-md-6 mb-3">
			<a href="{{route('admin.order.add')}}" class="btn btn-primary">[+] Tambah</a>
		</div>

		<div class="col-md-6 mb-3">
			<form method="GET" action="#">
				@csrf
				<div class="input-group">
					<input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control" placeholder="Cari Sesuatu..." id="keyword" autofocus>
					<span class="input-group-btn"><button type="button" name="cari" class="btn btn-primary">Cari</button></span>
				</div>
			</form>
		</div>
	</div>

	<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
			  <th scope="col">Kode Delivery</th>      
		      <th scope="col">Nomor Meja</th>
		      <th scope="col">Tanggal Order</th>
		      <th scope="col">Pemesan</th>
		      <th scope="col">Keterangan</th>
		      <th scope="col">Status</th>
		    </tr> 
		  </thead>
		  <tbody>
		    @foreach($data as $dt)
		    <tr>
		      <th scope="row">{{$loop->iteration}}</th>
		      <td>{{$dt->kode_order}}</td>
		      <td>{{$dt->no_meja}}</td>
		      <td>{{$dt->created_at}}</td>
		      <td>{{$dt->fullname}}</td>
		      <td>{{$dt->keterangan}}</td>

		      <td>
		      	<?php 
	            if ($dt['status_order']=='Dikonfirmasi') {
	                echo "<span class='label label-success'>Dikonfirmasi</span>";
	            } elseif($dt['status_order']=='Menunggu') {
	            	echo "<span class='label label-warning'>Menunggu</span>";
	            } else {
	            	echo "<span class='label label-danger'>Dibatalkan</span>";
	            }
	     		?>
		      </td>

		      <td>

		          <a href="{{route('admin.order.edit', ['id_order'=>$dt->id_order])}}" class="btn btn-success btn-sm">
		          	<i class="fa fa-w fa-edit"></i>
		          </a>

		          <button class="btn btn-danger btn-sm btn-trash"
		          data-id="{{$dt->id_order}}"
		          type="button">
		          	<i class="fa fa-w fa-trash"></i>
		          </button>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>

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
					<form id="form-delete" action="{{ route('admin.order') }}" method="post" >
						@method('delete')
						@csrf
						<input type="hidden" name="id_order" id="input-id">
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
			id_order = $(this).attr('data-id');
			$('#input-id').val(id_order);
			$('#deleteModal').modal('show');
		});

		$('.btn-delete').click(function() {
			$('#form-delete').submit();
		});

	})
</script>

@endpush