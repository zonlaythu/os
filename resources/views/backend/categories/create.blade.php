@extends('backendtemplate')
@section('content')
<div class="container">
	<h2>Categories Create(Table))</h2>

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
			<form enctype="multipart/form-data" method="POST" action="{{route('categories.store')}}">
				@csrf
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control">
					@error('name')
					<p class="text-danger">Your Name is required!</p>
					@enderror
				</div>

				<div class="form-group">
					<label>Photo</label>
					<input type="file" name="photo" class="form-control-file">
					@error('photo')
					<p class="text-danger">Your Photo is required!</p>
					@enderror
				</div>

				<button class="btn btn-primary" type="submit" name="btnsubmit">Save</button>
			</form>

		</div>
	</div>

</div>
@endsection