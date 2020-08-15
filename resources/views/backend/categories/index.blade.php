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
			@php $j=1; @endphp
			@foreach($categories as $category)
			<tr>
				<td>{{$j++}}</td>
				<td>{{$category->name}}</td>
				<td><img src="{{asset($category->photo)}}" class="img-fluid" width="80px;"></td>
				<td>
					<a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">Edit</a>

					<form method="POST" action="{{route('categories.destroy',$category->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
						@csrf
						@method('DELETE')
						<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
					</form>
					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection