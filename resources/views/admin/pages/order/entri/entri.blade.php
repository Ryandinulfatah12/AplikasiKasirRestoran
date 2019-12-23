@extends('admin.main')
@section('title','Entri Order')

@section('content')

<div class="container">
	<h1>Entri Order</h1>

	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>No Meja</th>
					<th>Sampai</th>
					<th>Waktu Pesan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Steve</td>
					<td>Jobs</td>
					<td>@steve</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Simon</td>
					<td>Philips</td>
					<td>@simon</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Jane</td>
					<td>Doe</td>
					<td>@jane</td>
				</tr>
			</tbody>
		</table>
	</div>
	
</div>

@endsection