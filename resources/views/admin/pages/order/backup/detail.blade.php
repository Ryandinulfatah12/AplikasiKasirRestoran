@extends('admin.main2')
@section('title','Detail Order')
@section('content')

<div class="container-fluid">
	<h1>Detail Order</h1>
	
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

                <form action="{{route('entri.finish',['id_order'=>$order->id_order])}}" method="POST">
                	@csrf
                	<input type="hidden" name="status_order" value="Menunggu Pembayaran">
                	<button class="btn btn-success" type="submit">Finish Order</button>
                </form>
                @endforeach
              </tbody>
          </table>
        </div>
  </div>
	

</div>

@endsection