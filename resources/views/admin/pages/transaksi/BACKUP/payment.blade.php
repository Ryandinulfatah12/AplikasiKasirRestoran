@extends('admin.main2')
@section('title','Pembayaran')
@section('content')

<div class="container-fluid">
	<h2>Pembayaran</h2>

  <div class="row">

        <div class=" col-lg-4">

		      <div class="row">
		        <div class="card">

		            <div class="card-header bg-success text-white pb-1">
		                <h5>Tambah Transaksi</h5>
		            </div>

		            <div class="card-body">

		            	<strong>Rp. {{number_format($orders->subtotal),0,',','.'}}</strong>

		              <form action="{{route('pay')}}" method="post">
		              	<input type="hidden" id="txtTotal" class="form-control" value="{{$orders->subtotal}}">

		              	<label>Uang</label>
		                <div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text bg-success-lighter text-white">Rp.</span>
							</div>
							<input type="number" name="total" id="txtBayar" class="form-control" placeholder="Uang Masuk">
						</div>
						<label>Kembalian</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text bg-success-lighter text-white">Rp.</span>
							</div>
							<input type="number" name="kembalian" id="txtKembalian" class="form-control" placeholder="Uang Kembalian" disabled>
						</div>

		                <div class="form-group">
		                  <button id="btnPay" class="btn btn-success">Bayar</button>
		                </div>
		              </form>

			        </div>    
				</div>
		      </div>
		</div>
  </div>


	
</div>

@endsection

@push('js')

<script type="text/javascript">
	$("#btnPay").click(function () {
		var total = $("#txtTotal").val();
		var bayar= $("#txtBayar").val();
		var kembalian = parseInt(bayar) - parseInt(total);
		$("#txtKembalian").val(kembalian);
	});
</script>

@endpush