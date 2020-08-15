@extends('backendtemplate')
@section('content')
<div class="container">

	<h2 class="d-inline-block">subcategories List(Table)</h2>
	<a href="{{route('subcategories.create')}}" class="btn btn-success float-right">Add Subcategories</a>
	<table class="table table-bordered">
		<thead>
			<th>No</th>			
			<th>Name</th>
			<th>Category Name</th>
			<th>Actions</th>

		</thead>

		<tbody>
			
			@php $j=1; @endphp
			@foreach($subcategories as $subcategory)
			<tr>
				<td>{{$j++}}</td>
				<td>{{$subcategory->name}}</td>
				<td>@foreach($categories as $category)
					@if($category->id==$subcategory->category_id)
					{{$category->name}}
					@endif
					@endforeach
				</td>
				<td>
					<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning">Edit</a>

					<form method="POST" action="{{route('subcategories.destroy',$subcategory->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
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