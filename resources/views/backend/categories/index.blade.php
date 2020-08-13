@extends('backendtemplate')
@section('content')
<div class="container">

	<h2 class="d-inline-block">Categories List(Table)</h2>
	<a href="{{route('categories.create')}}" class="btn btn-success float-right">Add item</a>
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Photo</th>
			<th>Actions</th>
		</thead>

		<tbody>
			<tr>
				<td>1</td>
				<td>Shoes
					<a href="{{route('categories.show',1)}}">
						<span class="badge badge-primary badge-spill">Detail</span></a>
				</td>
				<td>Shoes.jpg</td>
				
				<td>
					<a href="{{route('categories.edit',1)}}" class="btn btn-warning">Edit</a>
					<a href="" class="btn btn-danger">Delete</a>

				</td>

			</tr>
		</tbody>
	</table>
</div>
@endsection