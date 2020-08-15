@extends('backendtemplate')
@section('content')
<div class="container">
	<h2>Subcategory Edit(Table)</h2>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form enctype="multipart/form-data" method="POST" action="{{route('subcategories.update',$subcategory->id)}}">
				@csrf
				@method('PUT')
				
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$subcategory->name}}">
				</div>

				<div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">				
						@foreach($categories as $category)
						<option value="{{$category->id}}"
							@if($category->id==$subcategory->category_id)
							{{'selected'}}
							@endif
							>{{$category->name}}</option>
						@endforeach
					</select>
				</div>

				<button class="btn btn-primary" type="submit" name="btnsubmit">Update</button>
			</form>

		</div>
	</div>
</div>
@endsection