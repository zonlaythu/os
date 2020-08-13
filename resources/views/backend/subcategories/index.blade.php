@extends('backendtemplate')
@section('content')
<div class="container">

	<h2 class="d-inline-block">subcategories List(Table)</h2>
	<a href="{{route('subcategories.create')}}" class="btn btn-success float-right">subcategories item</a>
	<table class="table table-bordered">
		<thead>
			<th>No</th>			
			<th>Name</th>
			<th>Category Name</th>
			<th>Actions</th>

		</thead>

		<tbody>
			<tr>
				<td>1</td>				
				<td>Men Shoes</td>
				<td>Shoes</td>
				<td>
					<a href="{{route('subcategories.edit',1)}}" class="btn btn-warning">Edit</a>
					<a href="" class="btn btn-danger">Delete</a>

				</td>

			</tr>
		</tbody>
	</table>
</div>
@endsection