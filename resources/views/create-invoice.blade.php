@extends('layout')

@section('title', 'Create New Invoice')

@section('content')

	<div class='row'>
		<div class='col-md-8 offset-md-2'>

			<form method='POST' action='/invoices'>

				{{ csrf_field() }}

				<div class="form-group">
					<label>Invoice Number</label>
					<input type='text' name='invoice_number' class="form-control" placeholder='Invoice Number' required>
				</div>

				<div class="form-group">
					<label>Customer Name</label>
					<input type='text' name='customer_name' class="form-control" placeholder='Customer Name' required>
				</div>

				<div class="form-group">
					<label>Customer Address</label>
					<input type='text' name='address' class="form-control" placeholder='Customer Address'>
				</div>

				<div class="form-group">
					<label>Invoice Date</label>
					<input type='date' name='invoice_date' class="form-control" required>
				</div>

				<div class="form-group">
					<label>Due Date</label>
					<input type='date' name='due_date' class="form-control" required>
				</div>

				<div class="form-group">
					<label>Notes</label>
					<input type='text' name='note' placeholder='Notes' class="form-control" >
				</div>

				<div>
					<div id='products-group'></div>
					<button type="button" class="btn btn-primary btn-block" id='add-product-btn' style='margin-bottom: 10px'>
						Add a Product
					</button>
				</div>

				<div>
					<div id='payments-group'></div>
					<button type="button" class="btn btn-primary btn-block" id='add-payment-btn' style='margin-bottom: 10px'>
						Add a Payment
					</button>
				</div>


				<button class="btn btn-success" type='submit' class="form-control" >Submit</button>
			</form>

			<div class='product-row-template' style='display:none'>
					<div class='form-row'>
						<div class="form-group col">
							<label>Product Name</label>
							<select class="form-control" name='product_name[]'>
								@foreach ($products as $product)
									<option>{{ $product->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col">
							<label>Quantity</label>
							<input type='number' name='product_quantity[]' placeholder='Quantity' class="form-control" required>
						</div>
						<div class="form-group col">
							<label>Price</label>
							<input type='number' name='product_price[]' placeholder='Price' class="form-control" required>
						</div>
						<div class="form-group col">
							<label>Tax</label>
							<input type='number' name='product_tax[]' placeholder='Tax' class="form-control" required>
						</div>
						<button type="button" class="btn btn-danger btn-sm delete-row-btn">
							Delete
						</button>
					</div>
				</div>
	
				<div class='payment-row-template' style='display:none'>
					<div class='form-row'>
						<div class="form-group col">
							<label>Payment Type</label>
							<select class="form-control" name='payment_type[]'>
								@foreach ($paymentTypes as $paymentType)
									<option>{{ $paymentType->name }}</option>
								@endforeach
							</select>
						</div>
	
						<div class="form-group col">
							<label>Amount</label>
							<input type='number' name='payment_amount[]' placeholder='Amount' class="form-control" required>
						</div>
	
						<button type="button" class="btn btn-danger btn-sm delete-row-btn">
							Delete
						</button>
					</div>
				</div>

		</div>
	</div>


@endsection