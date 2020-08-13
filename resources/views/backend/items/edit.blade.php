@extends('backendtemplate')
@section('content')
<div class="container">
	<h2>Item Edit(Table))</h2>

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
			<form enctype="multipart/form-data" method="POST" action="{{route('items.update',$item->id)}}">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label>Codeno</label>
					<input type="text" name="codeno" class="form-control" value="{{$item->codeno}}">
				</div>

				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$item->name}}">
				</div>

				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="photo" class="form-control-file">
					<img src="{{asset($item->photo)}}" class="img-fluid w-25 h-25">
					<input type="hidden" name="oldphoto" value="{{$item->photo}}">
				</div>

				<div class="form-group">
					<label>Price</label>
					<input type="number" name="price" class="form-control" value="{{$item->price}}">
				</div>

				<div class="form-group">
					<label>Discount</label>
					<input type="number" name="discount" class="form-control" value="{{$item->discount}}">
				</div>

				<div class="form-group">
					<label>Description</label>
					<input type="text" name="des" class="form-control" value="{{$item->description}}">
				</div>

				<div class="form-group">
					<label>Brand</label>
					<select name="brand" class="form-control">
						
						@foreach($brands as $brand)
						<option value="{{$brand->id}}"
							@if($brand->id==$item->brand_id)
							{{'selected'}}
							@endif
							>{{$brand->name}}</option>
						@endforeach

					</select>
				</div>

				<div class="form-group">
					<label>Subcategory</label>
					<select name="subcategory" class="form-control">
						
						@foreach($subcategories as $subcategory)
						<option value="{{$subcategory->id}}"
							@if($subcategory->id==$item->subcategory_id)
							{{'selected'}}
							@endif
							>{{$subcategory->name}}</option>
						@endforeach
					</select>
				</div>
				<button class="btn btn-primary" type="submit" name="btnsubmit">Update</button>
			</form>

		</div>
	</div>

</div>
@endsection