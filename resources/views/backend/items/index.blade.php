@extends('backendtemplate')
@section('content')
<div class="container">

	<h2 class="d-inline-block">Item List(Table)</h2>
	<a href="{{route('items.create')}}" class="btn btn-success float-right">Add item</a>
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>CodeNo</th>
			<th>Name</th>
			<th>Price</th>
			<th>Actions</th>

		</thead>

		<tbody>
			<tr>
				<td>1</td>
				<td>0001
					<a href="{{route('items.show',1)}}">
						<span class="badge badge-primary badge-spill">Detail</span></a>
				</td>
				<td>Su Su</td>
				<td>5500 MMk</td>
				<td>
					<a href="{{route('items.edit',1)}}" class="btn btn-warning">Edit</a>
					<a href="" class="btn btn-danger">Delete</a>

				</td>

			</tr>
		</tbody>
	</table>
</div>
@endsection