@extends('admin.main2')
@section('title','Cashier')

@section('content')

<div class="container">
	<h1>Cashier</h1>

<table class="table table-bordered" id="datatabled">
  <thead class="border-0">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kode Order</th>
      <th scope="col">No Meja</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$order->kode_order}}</td>
      <td>{{$order->no_meja}}</td>
      <td>
        <a class="btn btn-success" href="{{route('payment', ['id_order' => $order->id_order])}}">Pay!</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
	

</div>

@endsection