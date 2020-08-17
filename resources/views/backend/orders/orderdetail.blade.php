@extends('backendtemplate')
@section('content')
<!-- DataTales Example -->
<div class="container">		
	<!-- <div class="card-body py-0"> -->
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th colspan="4">
							<h3 class="font-weight-bold text-center">Order Detail</h3>
							<h5 class="text-center">Online shopping</h5>
						</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td colspan="4">
							<div class="row">
								<div class="offset-md-4 col-md-2">
									<h5>Casher:</h5>
								</div>
								<div class="col-md-3">
									<h5>{{Auth::user()->name}}</h5>
								</div>

								<div class="offset-md-4 col-md-2">
									<h5>Voucherno:</h5>
								</div>
									
								<div class="col-md-3">

									<h5>{{$orders->voucherno}}</h5>
								</div>
								<div class="offset-md-4 col-md-2">
									<h5>Date :</h5>
								</div>
								<div class="col-md-3">
									<h5>{{$orders->orderdate}}</h5>
								</div>
								
							</td>
						</tr>

						<tr>
							<th>Item Name</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Amount</th>
						</tr>

						<tr>
							{{-- @php 
							$amount1=0;
							@endphp --}}

							@foreach($orders->items as $item)
							
							<tr>
								<td>{{ $item->name}}</td>
								<td>{{ $item->price}}</td>
								<td>{{ $item->pivot->qty}}</td>
								<td>{{ $item->pivot->qty * $item->price}}</td>

							</tr>

						
					@endforeach
				</tbody>

				<tfoot>
					<tr>
						<td colspan="3">Total amount</td>
						<td>{{$orders->total}}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection