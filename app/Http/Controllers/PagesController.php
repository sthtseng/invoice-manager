<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Invoice;
use App\Purchase;
use App\Payment;

class PagesController extends Controller
{
    public function dashboard() {
    	$invoices = \App\Invoice::where('deleted', 0)->get();
    	
	    return view('dashboard', [
	    	'invoices' => $invoices,
	    ]);
	}

	public function create() {
    	$products = \App\Product::all();
    	$paymentTypes = \App\PaymentType::all();

		return view('create-invoice', [
			'products' => $products,
			'paymentTypes' => $paymentTypes,
	    ]);
	}

	public function store() {
		$invoice = new Invoice();
		$invoice->customer_name = request('customer_name');
		$invoice->address = request('address');
		$invoice->invoice_date = request('invoice_date');
		$invoice->due_date = request('due_date');
		$invoice->note = request('note');
		$invoice->deleted = 0;

		$invoiceId = DB::table('invoices')->insertGetId($invoice->toArray());

		
		foreach(request('product_id') as $key => $productId) {
			$purchase = new Purchase();
			$purchase->invoice_id = $invoiceId;
			$purchase->product_id = $productId;
			$purchase->quantity = request('product_quantity')[$key];
			$purchase->price = request('product_price')[$key];
			$purchase->tax = request('product_tax')[$key];
			$purchase->save();
		}

		foreach(request('product_id') as $key => $paymentTypeId) {
			$payment = new Payment();
			$payment->payment_type_id = $paymentTypeId;
			$payment->invoice_id = $invoiceId;
			$payment->amount = request('payment_amount')[$key];
			$payment->save();
		}

		return redirect('/');
	}
}
