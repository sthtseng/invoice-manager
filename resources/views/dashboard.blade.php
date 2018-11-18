@extends('layout')

@section('title', 'Dashboard | Invoice Manager')

@section('content')

	@foreach ($products as $product)
		<li>{{ $product->name }} : ${{ $product->price }}</li>

	@endforeach
	<!-- Create/Edit Modal -->
	<div class="modal fade" id="editModal" role="dialog">
		<div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create Invoice {{ $foo }}</h4>
				</div>
				<div class="modal-body invoice">
					<input type="text" class="form-control invoiceNumber">
					<input type="text" class="form-control customerName">
					<input type="text" class="form-control address">
					<input type="text" class="form-control invoiceDate">
					<input type="text" class="form-control dueDate">
					<input type="text" class="form-control note">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Create</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		  
		</div>
	</div>


@endsection