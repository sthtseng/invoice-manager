@extends('layout')

@section('title', 'Dashboard | Invoice Manager')

@section('content')

	@foreach ($products as $product)
		<li>{{ $product->name }} : ${{ $product->price }}</li>

	@endforeach

	@foreach ($paymentTypes as $paymentType)
		<li>{{ $paymentType->name }}</li>

	@endforeach


	<form method='POST' action='/invoices'>

		{{ csrf_field() }}

		<div class="form-group">
			<input type='text' name='customer_name' placeholder='Customer Name'>
		</div>

		<div class="form-group">
			<input type='text' name='address' placeholder='Customer Address'>
		</div>

		<div class="form-group">
			<input type='date' name='invoice_date'>
		</div>

		<div class="form-group">
			<input type='date' name='due_date'>
		</div>

		<div class="form-group">
			<input type='text' name='note' placeholder='Notes'>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type='submit'>Submit</button>
		</div>

	</form>


@endsection