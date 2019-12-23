@extends('admin.main')
@section('title','Cashier')

@section('content')

<div class="container">
	<h1>Cashier</h1>

	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>No Meja</th>
					<th>Nama Makanan</th>
					<th>Harga</th>
					<th>Jumlah Item</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Steve</td>
					<td>Jobs</td>
					<td>@steve</td>
					<td>5</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Simon</td>
					<td>Philips</td>
					<td>@simon</td>
					<td>5</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Jane</td>
					<td>Doe</td>
					<td>@jane</td>
					<td>5</td>
				</tr>
			</tbody>
		</table>
	</div>

</div>

@endsection