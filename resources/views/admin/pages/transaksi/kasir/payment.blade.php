@extends('admin.main2')
@section('title','Pembayaran')
@section('content')

<div class="container-fluid">
	<h2>Pembayaran</h2>

  <div class="col-lg-12">
		<div class="col-lg-12">
          <table class="table shadow-0">
              <thead>
                <tr>
                  <th scope="col">Kode Pemesanan</th>
                  <th scope="col">ID User</th>
                  <th scope="col">No Meja</th>
                  <th scope="col">Dipesan pada</th>
                  <th scope="col">Detail Pesan Item</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($orders as $order)
                <tr>
                  <th scope="row">{{$order->kode_order}}</th>
                  <td>{{$order->id_user}}</td>
                  <td>{{$order->no_meja}}</td>
                  <td>{{$order->created_at}}</td>
				  
				  
                  <td>
                  	@foreach($order->cart->items as $item)
                  	<ul class="list-group list-group-flush">
	                  <li class="list-group-item">
	                  	<span class="badge badge-light">{{$item['item']['nama_masakan']}}</span> 
	                  	<span class="badge badge-info">Harga Satuan : Rp.{{number_format($item['item']['harga']),0,',','.'}}</span>
	                  	<span class="badge badge-warning">Qty {{$item['qty']}}</span> 
	                  	<span class="badge badge-danger">Subtotal : Rp.{{number_format($item['harga']),0,',','.'}}</span>
	                  </li>
	                </ul>
	                @endforeach
                  </td>

                </tr>
                <td class="text-success-darker"><p style="text-transform: uppercase; font-weight: bold; float: right;">Total	: Rp.{{number_format($order->cart->totalPrice),0,',','.'}}</p></td>
                @endforeach
              </tbody>
          </table>
        </div>

        <div class=" col-lg-6">

		      <div class="row p-4">
		        <div class="card">

		            <div class="card-header bg-success text-white pb-1">
		                <h5>Tambah Transaksi</h5>
		            </div>

		            <div class="card-body">

		              <form action="#">
		              	<label>Uang</label>
		                <div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text bg-success-lighter text-white">Rp.</span>
							</div>
							<input type="number" class="form-control" placeholder="Uang Masuk">
							<div class="input-group-append">
							  <span class="input-group-text bg-success-lighter text-white">.00</span>
							</div>
						</div>
						<label>Kembalian</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
							  <span class="input-group-text bg-success-lighter text-white">Rp.</span>
							</div>
							<input type="number" class="form-control" placeholder="Uang Kembalian" disabled>
							<div class="input-group-append">
							  <span class="input-group-text bg-success-lighter text-white">.00</span>
							</div>
						</div>

		                <div class="form-group">
		                  <button class="btn btn-success">Bayar</button>
		                </div>
		              </form>

			        </div>    
				</div>
		      </div>
		</div>
  </div>


	
</div>

@endsection