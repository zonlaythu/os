@extends('backendtemplate')
@section('content')
<div class="container">
	<h2>Item Detail(Your UI))</h2>
	<div class="container text-center mt-5">
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="{{asset($brands->photo)}}" class="card-img w-100 img-fluid h-100" alt="...">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<div class="row">
						<div class="col-md-6">
							<p class="card-text">Brand Name:</p>
						</div>
						<div class="col-md-6">
							{{$brands->name}}
						</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection