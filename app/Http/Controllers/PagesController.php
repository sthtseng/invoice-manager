<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard() {
    	$products = \App\Product::all();
    	
	    return view('dashboard', [
	    	'foo' => 'bar',
	    	'products' => $products
	    ]);
	}
}
