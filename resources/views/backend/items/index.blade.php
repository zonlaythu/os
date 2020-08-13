@extends('backendtemplate')
@section('content')
<div class="container">

	<h2 class="d-inline-block">Item List(Table)</h2>
	<a href="{{route('items.create')}}" class="btn btn-success float-right">Add item</a>
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>CodeNo</th>
			<th>Name</th>
			<th>Price</th>
			<th>Actions</th>

		</thead>

		<tbody>
			@php $j=1; @endphp
			@foreach($items as $item)
			<tr>
				<td>{{$j++}}</td>
				<td>{{$item->codeno}}
					<a href="{{route('items.show',$item->id)}}">
						<span class="badge badge-primary badge-spill">Detail</span></a>
						<a href="#" class="box" data-name="{{$item->name}}" data-price="{{$item->price}}" data-description="{{$item->description}}" data-photo="{{asset($item->photo)}}">
							<span class="badge badge-primary badge-spill">Modal</span></a>
						</td>
				<td>{{$item->name}}</td>
				<td>${{$item->price}}</td>
				<td>
					<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning">Edit</a>

					<form method="POST" action="{{route('items.destroy',$item->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
						@csrf
						@method('DELETE')
						<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
					</form>
					
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
{{-- Detail Modal --}}
<div class="modal" tabindex="-1" id="mymodal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Item Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col-md-6">
      		<img src="" class="img-fluid w-100 d-block mx-auto" id="photo">
      	</div>

      	<div class="col-md-6">
      		<p>Name:<strong id="name"></strong></p>
      		<p>Price:<strong id="price"></strong></p>
      		<p>Description:<strong id="description"></strong></p>
      	</div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@section('script')
<script type="text/javascript">
$(document).ready(function(){
	$(".box").click(function(){
	var name=$(this).data('name');
	var photo=$(this).data('photo');
	var price=$(this).data('price');
	var description=$(this).data('description');
	$("#photo").attr('src',photo);
	$("#name").text(name);
	$("#price").text(price);
	$("#description").text(description);
	$("#mymodal").modal('show');
})
})
</script>
@endsection