@extends('frontendtemplate')

@section('content')
<div class="col-lg-9">
	<h2 class="text-center my-5">Item Detail</h2>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="{{asset($item->photo)}}" class="img-fluid w-75">
			</div>

			<div class="col-md-8 table-responsive">
				<table class="table">
					<tbody>
						<tr> 
							<td>Name</td>
							<td>{{$item->name}}</td>
						</tr>

						<tr>
							<td>CodeNo</td>
							<td>{{$item->codeno}}</td>
						</tr>

						<tr>
							<td>Price</td>
							<td>{{$item->price}}</td>
						</tr>

						<tr>
							<td>Description</td>
							<td>{{$item->description}}</td>
						</tr>

						<tr>
							<td>
								<a href="" class="btn btn-info addtocart"
								data-id="{{$item->id}}"
								data-name="{{$item->name}}"
								data-price="{{$item->price}}"
								data-photo="{{$item->photo}}"
								data-discount="{{$item->discount}}"
								>Add to Cart</a>
							</td>
							<td>
								<a href="#" class="btn btn-primary">Buy_now</a>
							</td>

						</tr>
					</tbody>
				</table> 
			</div>

		</div>
	</div>

</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('frontend/Js/script.js')}}"></script>
@endsection
