@extends('frontendtemplate')

@section('content')
<div class="col-lg-9">
	
	<div class="container">

		<div class="card o-hidden border-0 shadow-md my-5">
			<div class="card-body p-0">
				<div class="row">
					<div class="offset-md-2 col-md-8">
						<h2 class="text-center">Your Profile</h2>
						Name:{{Auth::user()->name}};<br>
						Email:{{Auth::user()->email}};</br>
						Phone:{{Auth::user()->phone}};<br>
						{{-- <form method="" action="" enctype="multipart/form-data">

							<div class=form-group>
								<label>Photo</label>
								<input type="file" name="" value="" class="form-control-file">
								<img src="">
							</div>

							<div class=form-group>
								<label>Name</label>
								<input type="text" name="" value="" class="form-control">
							</div>


							<div class=form-group>
								<label>Email</label>
								<input type="email" name="" value="" class="form-control">
							</div>

							<div class=form-group>
								<label>Phone</label>
								<input type="number" name="" value="" class="form-control">
							</div>

							<div class="form-group">
								<label>Address</label>
								<textarea class="form-control"></textarea>
							</div>
							<div>
								<a href="" class="btn btn-primary" type="submit">Save</a>
							</div>
						</form> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
</div>

@endsection