@extends('layouts.report')
@section('title','Your Invoice')
@section('content')

<div class="row contacts">
	    <div class="col invoice-to">
	        <div class="text-gray-light">INVOICE TO:</div>
	        @foreach($data as $dt)
	        <h2 class="to">{{$dt->fullname}}</h2>
	        @endforeach
	    </div>
	    <div class="col invoice-details">
	    	@foreach($data as $dt)
	        <h1 class="invoice-id">{{$dt->kode_order}}</h1>
	        <div class="date">Date of Invoice: {{$dt->created_at}}</div>
	        @endforeach
	    </div>
	</div>
	<table border="0" cellspacing="0" cellpadding="0">
	    <thead>
	        <tr>
	            <th>Kode Order</th>
	            <th>Nomor Meja</th>
	            <th>Dipesan Pada</th>
	            <th class="text-left">Item Pesanan</th>
	            <th class="text-right">Total</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($orders as $order)
	        <tr>
	            <td>{{$order->kode_order}}</td>
	            <td>{{$order->no_meja}}</td>
	            <td>{{$order->created_at}}</td>
	            <td class="text-left"> 
	            	@foreach($order->cart->items as $item)
	                <ul class="list-group list-group-flush">
				        <li class="list-group-item">
				          <span>{{$item['item']['nama_masakan']}}</span> |
				          <span>Harga Satuan : Rp.{{number_format($item['item']['harga']),0,',','.'}}</span> |
				          <span>Qty {{$item['qty']}}</span> 
				        </li>
				      </ul>
	                @endforeach
	            </td>
	            <td class="text-right"><strong>Rp.{{number_format($order->subtotal),0,',','.'}}</strong></td>
	        </tr>
	        @endforeach
	    </tbody>
	    <tfoot>
	        <tr>
	            <td colspan="2"></td>
	            <td colspan="2">Total Tagihan</td>
	            @foreach($orders as $order)
	            <td><strong>Rp.{{number_format($order->subtotal),0,',','.'}}</strong></td>
	            @endforeach
	        </tr>
	        <tr>
	            <td colspan="2"></td>
	            <td colspan="2">Uang Masuk</td>
	            @foreach($data as $dt)
	            <td>Rp.{{number_format($dt->total_bayar),0,',','.'}}</td>
	            @endforeach
	        </tr>
	        <tr>
	            <td colspan="2"></td>
	            <td colspan="2">Kembalian</td>
	            @foreach($data as $dt)
	            <td>Rp.{{number_format($dt->kembalian),0,',','.'}}</td>
	            @endforeach
	        </tr>
	    </tfoot>
	</table>
	<div class="thanks">Thank you!</div>
	<div class="notices">
	    <div>NOTICE:</div>
	    <div class="notice">Awoakwaowkawok.</div>
	</div>

@endsection