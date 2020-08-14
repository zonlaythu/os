@extends('frontendtemplate')

@section('content')
<div class="col-lg-9">
	<div id="checkout_body">
		<div class="container my-5 text-center banner">
			<div class="row py-5">
				<div class="offset-md-2 col-md-8">
					<h3 class="py-3">Check Out</h3>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>IMAGE</th>
									<th>PRODUCT</th>
									<th>PRICE</th>
									<th>QUANTITY</th>
									<th>TOTAL</th>
								</tr>
							</thead>
							<tbody id="tbody">

							</tbody>
						</table>
					</div>
				</div>
				<div class="offset-2 col-md-8 mt-3">
					<div class="form-group">
						<textarea class="form-control notes" placeholder="Notes">		
						</textarea>
					</div>
					{{-- <input type="hidden" name="" class="total"> --}}
				</div>
				<div class="offset-md-2 col-md-3 mt-3">
					<a href="{{route('homepage')}}" class="btn btn-secondary">Continue Shopping</a>
				</div>

				<div class="offset-md-2 col-md-4 mt-3">
					@auth
					<a href="#" class="btn btn-secondary buy_now">Buy Now</a>
					@else
					<a href="{{route('login')}}" class="btn btn-secondary buy_now">Login to Buy</a>
					@endauth
				</div>


			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{asset('frontend/Js/script.js')}}"></script>
@endsection