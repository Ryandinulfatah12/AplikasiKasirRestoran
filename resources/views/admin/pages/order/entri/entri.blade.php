
@extends('admin.main2')
@section('title','Entri Order')

@section('content')

<div class="container">

  <div class="col-lg-12">
      <h1>Entri Order</h1>
      <table class="table table-bordered" id="datatabled">
          <thead class="border-0">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Order</th>
              <th scope="col">No Meja</th>
              <th scope="col">Dipesan pada</th>
              <th scope="col">Item</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Total</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$order->kode_order}}</td>
              <td>{{$order->no_meja}}</td>
              <td>{{$order->created_at}}</td>
              <td>
                  <table class="table shadow-0">
                      <tbody>
                        @foreach($order->cart->items as $item)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$item['item']['nama_masakan']}}</td>
                          <td>{{$item['qty']}}</td>
                          <td>Rp.{{number_format($item['harga']),0,',','.'}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </td>
              <td>{{$order->keterangan}}</td>
              <td class="text-success-darkest">Rp. {{number_format($order->subtotal),0,',','.'}}</td>

              <td>
                <a class="btn btn-success" href="{{route('entri.accept', ['id_order'=>$order->id_order])}}" onclick="return confirm('Accept Entri?')">Accept Order</a>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>

</div>

@endsection



