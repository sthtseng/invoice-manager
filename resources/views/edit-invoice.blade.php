@extends('layout')

@section('title', 'Edit Invoice')

@section('content')

	<div class='row'>
		<div class='col-md-8 offset-md-2'>

			<form method='POST' action='/invoices'>

				{{ csrf_field() }}

				<div class="form-group" hidden>
					<input type='text' name='id' class="form-control" 
						placeholder='Invoice Number' value={{ $invoice->id }}>
				</div>

				<div class="form-group">
					<label>Invoice Number</label>
					<input type='text' name='invoice_number' class="form-control" 
						placeholder='Invoice Number' value={{ $invoice->invoice_number }} required>
				</div>

				<div class="form-group">
					<label>Customer Name</label>
					<input type='text' name='customer_name' class="form-control" 
						placeholder='Customer Name' value={{ $invoice->customer_name }} required>
				</div>

				<div class="form-group">
					<label>Customer Address</label>
					<input type='text' name='address' class="form-control" 
						placeholder='Customer Address' value={{ $invoice->address }}>
				</div>

				<div class="form-group">
					<label>Invoice Date</label>
					<input type='date' name='invoice_date' class="form-control"  
						value={{ $invoice->invoice_date }} required>
				</div>

				<div class="form-group">
					<label>Due Date</label>
					<input type='date' name='due_date' class="form-control" 
						value={{ $invoice->due_date }} required>
				</div>

				<div class="form-group">
					<label>Notes</label>
					<input type='text' name='note' placeholder='Notes' class="form-control" 
						value={{ $invoice->note }} >
				</div>

				<div>
					<div id='products-group'>
						@foreach($purchases as $purchase)
							<div class='form-row'>
								<div class="form-group col">
									<label>Product Name</label>
									<select class="form-control" name='product_name[]'>
										<option value={{ $purchase->product_name }}>{{ $purchase->product_name }}</option>
									</select>
								</div>
								<div class="form-group col">
									<label>Quantity</label>
									<input type='number' name='product_quantity[]' placeholder='Quantity' 
										class="form-control" value={{ $purchase->quantity }} required>
								</div>
								<div class="form-group col">
									<label>Price</label>
									<input type='number' name='product_price[]' placeholder='Price' 
										class="form-control" value={{ $purchase->price }} required>
								</div>
								<div class="form-group col">
									<label>Tax</label>
									<input type='number' name='product_tax[]' placeholder='Tax' 
										class="form-control" value={{ $purchase->tax }} required>
								</div>
								<button type="button" class="btn btn-danger btn-sm delete-row-btn">
									Delete
								</button>
							</div>
						@endforeach
					</div>
					<button type="button" class="btn btn-primary btn-block" id='add-product-btn' style='margin-bottom: 10px'>
						Add a Product
					</button>
				</div>

				<div>
					<div id='payments-group'>
						@foreach($payments as $payment)
							<div class='form-row'>
								<div class="form-group col">
									<label>Payment Type</label>
									<select class="form-control" name='payment_type[]'>
										<option>{{ $payment->payment_type }}</option>
									</select>
								</div>
			
								<div class="form-group col">
									<label>Amount</label>
									<input type='number' name='payment_amount[]' placeholder='Amount' 
										class="form-control" value={{ $payment->amount }} required>
								</div>
								<button type="button" class="btn btn-danger btn-sm delete-row-btn">
									Delete
								</button>
							</div>
						@endforeach
					</div>
					<button type="button" class="btn btn-primary btn-block" id='add-payment-btn' style='margin-bottom: 10px'>
						Add a Payment
					</button>
				</div>


				<button class="btn btn-success" type='submit' class="form-control" >Update</button>
				<a class="btn btn-danger delete-invoice-btn" data-id={{$invoice->id}} 
						href="#" role="button">
						Delete this Invoice
				</a>
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