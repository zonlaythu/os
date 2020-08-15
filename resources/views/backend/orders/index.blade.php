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
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection