@extends('backendtemplate')
@section('content')
<div class="container">
	<h2>Item Create(Table))</h2>

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
			<form enctype="multipart/form-data" method="POST" action="{{route('items.store')}}">
				@csrf
				<div class="form-group">
					<label>Codeno</label>
					<input type="text" name="codeno" class="form-control">
				</div>

				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
				</div>

				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="photo" class="form-control-file">
				</div>

				<div class="form-group">
					<label>Price</label>
					<input type="number" name="price" class="form-control">
				</div>

				<div class="form-group">
					<label>Discount</label>
					<input type="number" name="discount" class="form-control">
				</div>

				<div class="form-group">
					<label>Description</label>
					<input type="text" name="des" class="form-control">
				</div>

				<div class="form-group">
					<label>Brand</label>
					<select name="brand" class="form-control">
						

						@foreach($brands as $brand)
						<option value="{{$brand->id}}">{{$brand->name}}</option>
						@endforeach

					</select>
				</div>

				<div class="form-group">
					<label>Subcategory</label>
					<select name="subcategory" class="form-control">
						
						@foreach($subcategories as $subcategory)
						<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
						@endforeach
					</select>
				</div>
				<button class="btn btn-primary" type="submit" name="btnsubmit">Save</button>
			</form>

		</div>
	</div>

</div>
@endsection