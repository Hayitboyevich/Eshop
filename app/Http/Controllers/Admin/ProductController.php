<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Brand;
use Image;
use Carbon;
class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('admin.product.index', compact('products'));
    }

    public function create()
    {
    	$categories = Category::all();
    	$brands = Brand::all();
    	return view('admin.product.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {

    	$image_one = $request->file('image_one');
    	$name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    	Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
    	$img_url1 = 'frontend/img/product/upload/'.$name_gen; 

    	$image_two = $request->file('image_two');
    	$name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
    	Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
    	$img_url2 = 'frontend/img/product/upload/'.$name_gen; 

    	$image_three = $request->file('image_three');
    	$name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
    	Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
    	$img_url3 = 'frontend/img/product/upload/'.$name_gen;

    	Product::insert([
    		'category_id' => $request->input('category_id'),
    		'brand_id' => $request->input('brand_id'),
    		'product_name' => $request->input('product_name'),
    		'product_slug' => str_replace(' ', '-', $request->product_name),
    		'product_code' => $request->input('product_code'),
    		'price' => $request->input('price'),
    		'product_quantity' => $request->input('product_quantity'),
    		'short_description' => $request->short_description,
    		'long_description' => $request->long_description,
    		'image_one' => $img_url1,
    		'image_two' => $img_url2,
    		'image_three' => $img_url3,

    	]); 
    
    		return redirect('/product-create');
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	$categories = Category::all();
    	$brands = Brand::all();
    	return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id){
    	
    	$product = Product::find($id);
    	$product->product_name = $request->input('product_name');
    	$product->product_code = $request->input('product_code');
    	$product->price = $request->input('price');
    	$product->product_quantity = $request->input('product_quantity');
    	$product->category_id = $request->input('category_id');
    	$product->brand_id = $request->input('brand_id');
    	$product->short_description = $request->input('short_description');
    	$product->long_description = $request->input('long_description');
    	$product->save();
    	return redirect('/product');
    }

    public function imageupdate(Request $request)
    {
    	$id = $request->input('id');
    	$old_one = $request->input('image_one');
    	$old_two = $request->input('two');
    	$old_three = $request->input('image_three');
    	if ($request->has('image_one')) {
    		unlink($old_one);
    		$image_one = $request->file('image_one');
	    	$name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
	    	Image::make($image_one)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
	    	$img_url1 = 'frontend/img/product/upload/'.$name_gen; 

	    	Product::findOrFail($id)->update([
	    		'image_one' => $img_url1,	    	]);
	    	
	    	return redirect('/product');
	    	}

	    if ($request->has('image_two')) {
    		unlink($old_two);
    		$image_two = $request->file('image_two');
	    	$name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
	    	Image::make($image_two)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
	    	$img_url2 = 'frontend/img/product/upload/'.$name_gen; 

	    	Product::findOrFail($id)->update([
	    		'image_two' => $img_url2,	    	]);
	    	
	    	return redirect('/product');
	    	}
	    if ($request->has('image_three')) {
    		unlink($old_three);
    		$image_three = $request->file('image_three');
	    	$name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
	    	Image::make($image_three)->resize(270,270)->save('frontend/img/product/upload/'.$name_gen);
	    	$img_url3 = 'frontend/img/product/upload/'.$name_gen; 

	    	Product::findOrFail($id)->update([
	    		'image_one' => $img_url3,	    	]);
	    	
	    	return redirect('/product');
	    	}	
    }


    public function delete($id)
     {
     	$product = Product::findOrFail($id);
     	$product->delete();
     	return redirect('/product');
     }

     public function unactive($id)
     {
     	Product::find($id)->update(['status'=>0]);
     	return redirect('/product');
     }

     public function active($id)
     {
     	Product::find($id)->update(['status'=>1]);
     	return redirect('/product');
     }
}
