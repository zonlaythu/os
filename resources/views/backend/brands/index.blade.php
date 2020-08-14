@extends('backendtemplate')
@section('content')
<div class="container">
	<h2 class="d-inline-block">Brand List(Table)</h2>
	<a href="{{route('brands.create')}}" class="btn btn-success float-right">Add item</a>
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Photo</th>
			<th>Actions</th>
		</thead>
		
		<tbody>
			@php $j=1; @endphp
			@foreach($brands as $brand)
			<tr>
				<td>{{$j++}}</td>
				<td>{{$brand->name}}</td>
				<td><img src="{{asset($brand->photo)}}" class="img-fluid" width="80px;"></td>
				<td>
					<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning">Edit</a>

					<form method="POST" action="{{route('brands.destroy',$brand->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
						@csrf
						@method('DELETE')
						<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
					</form>
					
				</td>
			</tr>
			@endforeach
		</tbody>
</table>
@endsection

			