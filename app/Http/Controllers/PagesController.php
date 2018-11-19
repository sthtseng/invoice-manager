<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

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

		$invoice->save();


		return redirect('/');
	}
}
