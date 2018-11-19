@extends('layout')

@section('title', 'Dashboard | Invoice Manager')

@section('content')
	<a href='/invoices/create'>Create Invoice</a>
	
	@foreach ($invoices as $invoice)
		<li>{{ $invoice->customer_name }} </li>
	@endforeach


@endsection