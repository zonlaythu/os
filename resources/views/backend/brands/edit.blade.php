@extends('backendtemplate')
@section('content')
<div class="container">
	<h2>Brand Edit(Your UI))</h2>

	{{-- @if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif --}}

	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form enctype="multipart/form-data" method="POST" action="{{route('brands.update',$brand->id)}}">
				@csrf
				@method('PUT')
				<div class="form-group">
					
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$brand->name}}">
				</div>

				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="photo" class="form-control-file">
					<img src="{{asset($brand->photo)}}" class="img-fluid w-25 h-25">
					<input type="hidden" name="oldphoto" value="{{$brand->photo}}">
				</div>

				<button class="btn btn-primary" type="submit" name="btnsubmit">Update</button>
			</form>

		</div>
	</div>
</div>
@endsection