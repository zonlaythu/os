@extends('backendtemplate')
@section('content')
<div class="container">

	<h2 class="d-inline-block">Order List(Table)</h2>
	
	<table class="table table-bordered">
		<thead>
			<th>No</th>
			<th>VoucherNo</th>
			<th>OrderDate</th>
			<th>Note</th>
			<th>UserID</th>
			<th>Total</th>
			<th>Action</th>
		</thead>

		<tbody>
			@php $j=1; @endphp
			@foreach($orders as $order)
			<tr>
				<td>{{$j++}}</td>
				<td>{{$order->voucherno}}</td>
				<td>{{$order->orderdate}}</td>
				<td>{{$order->note}}</td>
				<td>{{$order->user_id}}</td>
				<td>{{$order->total}}</td>
				<td>
					<form method="POST" action="{{route('orders.destroy',$order->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
						@csrf
						@method('DELETE')
						<input type="submit" name="btnsubmit" value="Confirm" class="btn btn-primary">
					</form>
					<a href="{{route('orders.show',$order->id)}}" class="btn btn-info">Detail</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection