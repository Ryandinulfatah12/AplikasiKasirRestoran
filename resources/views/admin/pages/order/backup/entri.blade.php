@extends('admin.main2')
@section('title','Entri Order')

@section('content')

<div class="container">

  <div class="col-lg-11 pl-5">
      <h1>Entri Order</h1>
      <table class="table table-bordered" id="datatabled">
          <thead class="border-0">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Order</th>
              <th scope="col">No Meja</th>
              <th scope="col">Dipesan pada</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $orders = App\Order::where('status_order','Pending')->get();
             ?>
            @foreach($orders as $order)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$order->kode_order}}</td>
              <td>{{$order->no_meja}}</td>
              <td>{{$order->created_at}}</td>
              <td>
                <a class="btn btn-success" href="{{route('entri.detail',['id_order'=>$order->id_order])}}">Lihat Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>

</div>

@endsection



