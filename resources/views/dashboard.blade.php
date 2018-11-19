@extends('layout')

@section('title', 'Dashboard')

@section('content')

	<table class="table">
		<thead>
			<tr>
				<th scope="col">Invoice Number</th>
				<th scope="col">Customer Name</th>
				<th scope="col">Address</th>
				<th scope="col">Invoice Date</th>
				<th scope="col">Due Date</th>
				<th scope="col">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($invoices as $invoice)
				<tr>
					<th scope="row">{{ $invoice->invoice_number }}</th>
					<td>{{ $invoice->customer_name }}</td>
					<td>{{ $invoice->address }}</td>
					<td>{{ $invoice->invoice_date }}</td>
					<td>{{ $invoice->due_date }}</td>
					<td>
						<a class="btn btn-primary btn-sm" href="/invoices/{{$invoice->id}}" role="button">
							Edit
						</a>
						<a class="btn btn-danger btn-sm delete-invoice-btn" data-id={{$invoice->id}} 
							href="#" role="button">
							Delete
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection