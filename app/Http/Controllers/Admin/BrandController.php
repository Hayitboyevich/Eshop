<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function index()
    {
    	$brands = Brand::all();
    	return view('admin.brand.index', compact('brands'));
    }

     public function store(Request $req)
    {  	
    	$brands = new Brand;
    	$brands->brand_name = $req->input('brand_name');
    	$brands->save();
    	return redirect('/brand')->with('success', 'Brand Created!');
    }

    public function edit($id)
    {
    	$brand = Brand::find($id);
    	return view('admin.brand.edit', compact('brand'));
    }
     public function update(Request $request, $id)
     {
     	$brands = Brand::find($id);
     	$brands->brand_name = $request->input('brand_name');
     	$brands->status = $request->input('status') ? $request->input('status'):0;
     	$brands->save();
     	return redirect('/brand'); 
     }

     public function delete($id)
     {
     	$brend = Brand::findOrFail($id);
     	$brend->delete();
     	return redirect('/brand');
     }

     public function unactive($id)
     {
     	Brand::find($id)->update(['status'=>0]);
     	return redirect('/brand');
     }

     public function active($id)
     {
     	Brand::find($id)->update(['status'=>1]);
     	return redirect('/brand');
     }
}
