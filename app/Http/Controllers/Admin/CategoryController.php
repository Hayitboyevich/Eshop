<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return view('admin.category.index', compact('categories'));
    }

    public function store(Request $req)
    {
		   	

    	$categories = new Category;
    	$categories->category_name = $req->input('category_name');
    	$categories->save();
    	return redirect('/category')->with('success', 'Category Created!');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
    	return view('admin.category.edit', compact('category'));
    }
     public function update(Request $request, $id)
     {
     	$categories = Category::find($id);
     	$categories->category_name = $request->input('category_name');
     	$categories->status = $request->input('status') ? $request->input('status'):0;
     	$categories->save();
     	return redirect('/category'); 
     }

     public function delete($id)
     {
     	$category = Category::findOrFail($id);
     	$category->delete();
     	return redirect('/category');
     }

     public function unactive($id)
     {
     	Category::find($id)->update(['status'=>0]);
     	return redirect('/category');
     }

     public function active($id)
     {
     	Category::find($id)->update(['status'=>1]);
     	return redirect('/category');
     }
}
