@extends('frontendtemplate')

@section('content')

<div class="col-lg-9">

	<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<div class="row">
		@foreach($items as $item)
		<div class="col-lg-4 col-md-6 mb-4">
			
			<div class="card h-100">
				<a href="#"><img class="card-img-top" src="{{asset($item->photo)}}" alt=""></a>
				<div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{$item->name}}</a>
                </h4>
                <h5>${{$item->price}}</h5>
                <p class="card-text">{{$item->description}}</p>
              </div>
				<div class="card-footer">
					<a href="" class="btn btn-info addtocart"
					data-id="{{$item->id}}"
					data-name="{{$item->name}}"
					data-price="{{$item->price}}"
					data-photo="{{$item->photo}}"
					data-discount="{{$item->discount}}"
					>Add to Cart</a>
					
					<a href="{{route('detailname',$item->id)}}" class="btn btn-primary"						
						>Detail</a>
				</div>
			</div>
		</div>
	@endforeach
	<!-- /.row -->
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('frontend/Js/script.js')}}"></script>
@endsection
