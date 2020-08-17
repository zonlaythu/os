@extends('frontendtemplate')
@section('sidebar')
@include('frontend.sidebar')
@endsection

@section('content')
<div class="col-lg-9">
	<h2 class="itemname"></h2>
	
	<div id="myItems" class="row">
		
	</div>

</div>

@endsection

@section('script')
<script type="text/javascript" src="{{asset('frontend/Js/script.js')}}"></script>
<script type="text/javascript">


	$(document).ready(function(){
		showItems(0);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		function showItems(id){

			$.post("{{route('getItems')}}",{sid:id},function(res){

				var html='';

				$.each(res,function(i,v){
					var url='/itemdetail/'+v.id;

					html+=`<div class="col-lg-4 col-md-6 mb-4">
					<div class="card">
					<a href="#"><img class="card-img-top" src="${v.photo}" alt=""></a>
					<div class="card-body">
					<h4 class="card-title">
					<a href="#">${v.name}</a>
					</h4>
					<h5>${v.price}</h5>
					<p class="card-text">${v.description}</p>
					</div>
					<div class="card-footer">
					<a href="" class="btn btn-info addtocart"
					data-id="${v.id}"
					data-id="${v.photo}"
					data-name="${v.name}"
					data-price="${v.price}"
					data-photo=""
					data-discount="${v.discount}"
					>Add to Cart</a>
					
					<a href="url" class="btn btn-primary">Detail</a>
					</div>
					</div>
					</div>`

				})
				$('#myItems').html(html);


			})
		}
		$('.filter').click(function(){
			var id=$(this).data('id');
			var name=$(this).data('name');
			$('.itemname').text(name);

			showItems(id);
			
		})
	});
</script>
@endsection

