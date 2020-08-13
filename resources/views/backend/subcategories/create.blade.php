@extends('backendtemplate')
@section('content')
<div class="container">
	<h2>subcategories Create(Table))</h2>

	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form enctype="multipart/form-data" method="POST" action="{{route('subcategories.store')}}">
				@csrf

				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>


				<div class="form-group">
					<label>Subcategory</label>
					<select name="category" class="form-control">
						
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<button class="btn btn-primary" type="submit" name="btnsubmit">Save</button>
			</form>

		</div>
	</div>

</div>
@endsection