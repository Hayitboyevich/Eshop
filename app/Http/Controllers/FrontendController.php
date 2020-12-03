<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
    	$products = Product::where('status', 1)->get();
    	$categories = Category::where('status', 1)->get();
    	return view('pages.index', compact('products', 'categories'));
    } 

}
