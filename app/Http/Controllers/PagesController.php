<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Invoice;
use App\Purchase;
use App\Payment;

class PagesController extends Controller
{
	/**
	 * Returns the dashboard view
	 */
    public function dashboard() {
    	$invoices = \App\Invoice::where('deleted', 0)->get();
    	
	    return view('dashboard', [
	    	'invoices' => $invoices,
	    ]);
	}

	/**
	 * Returns the edit invoice view
	 */
	public function edit($id) {
    	$products = \App\Product::all();
		$paymentTypes = \App\PaymentType::all();
		
		// get invoice specific data
		$invoice = \App\Invoice::where('id', $id)->first();
		$purchases = json_decode($invoice->purchases);
		$payments = json_decode($invoice->payments);

		return view('edit-invoice', [
			'products' => $products,
			'paymentTypes' => $paymentTypes,
			'invoice' => $invoice,
			'purchases' => $purchases,
			'payments' => $payments,
	    ]);
	}

	/**
	 * Returns the create invoice view
	 */
	public function create() {
    	$products = \App\Product::all();
    	$paymentTypes = \App\PaymentType::all();

		return view('create-invoice', [
			'products' => $products,
			'paymentTypes' => $paymentTypes,
	    ]);
	}

	/**
	 * Handles the invoice post requests. Redirects to update or store function.
	 */
	public function postInvoice() {
		$id = request('id');
		if (!empty($id)) {
			// updates existing invoice
			return $this->update($id);
		} else {
			// creates new invoice
			return $this->store();
		}

	}

	/**
	 * Creates new invoice
	 */
	public function store() {
		$invoice = new Invoice();
		$invoice->invoice_number = request('invoice_number');
		$invoice->customer_name = request('customer_name');
		$invoice->address = request('address');
		$invoice->invoice_date = request('invoice_date');
		$invoice->due_date = request('due_date');
		$invoice->note = request('note');
		$invoice->deleted = 0;

		// iterate through each purchase line
		$purchases = array();
		foreach(request('product_name') as $key => $productName) {
			$purchase = new Purchase();
			$purchase->product_name = $productName;
			$purchase->quantity = request('product_quantity')[$key];
			$purchase->price = request('product_price')[$key];
			$purchase->tax = request('product_tax')[$key];
			array_push($purchases, $purchase);
		}
		$invoice->purchases = json_encode($purchases);

		// iterate through each payment line
		$payments = array();
		foreach(request('payment_type') as $key => $paymentType) {
			$payment = new Payment();
			$payment->payment_type = $paymentType;
			$payment->amount = request('payment_amount')[$key];
			array_push($payments, $payment);
		}
		$invoice->payments = json_encode($payments);

		$invoice->save();

		return redirect('/');
	}

	/**
	 * Updates the existing invoice
	 */
	public function update($id) {
		$invoice = \App\Invoice::find($id);
		$invoice->invoice_number = request('invoice_number');
		$invoice->customer_name = request('customer_name');
		$invoice->address = request('address');
		$invoice->invoice_date = request('invoice_date');
		$invoice->due_date = request('due_date');
		$invoice->note = request('note');

		// iterate through each purchase line
		$purchases = array();
		foreach(request('product_name') as $key => $productName) {
			$purchase = new Purchase();
			$purchase->product_name = $productName;
			$purchase->quantity = request('product_quantity')[$key];
			$purchase->price = request('product_price')[$key];
			$purchase->tax = request('product_tax')[$key];
			array_push($purchases, $purchase);
		}
		$invoice->purchases = json_encode($purchases);

		// iterate through each payment line
		$payments = array();
		foreach(request('payment_type') as $key => $paymentType) {
			$payment = new Payment();
			$payment->payment_type = $paymentType;
			$payment->amount = request('payment_amount')[$key];
			array_push($payments, $payment);
		}
		$invoice->payments = json_encode($payments);

		$invoice->save();

		return redirect('/');
	}
}
