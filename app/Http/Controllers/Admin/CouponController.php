<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function index()
    {
    	$coupons = Coupon::all();
    	return view('admin.coupon.index', compact('coupons'));
    }
    public function store(Request $req)
    {
    	$coupons = new Coupon;
        $coupons->discaunt = $req->input('discaunt');
    	$coupons->coupon_name = $req->input('coupon_name');
    	$coupons->save();
    	return redirect('/coupon');
    }

    public function edit($id)
    {
    	$coupon = Coupon::find($id);
    	return view('admin.coupon.edit', compact('coupon'));
    }
     public function update(Request $request, $id)
     {
     	$coupons = Coupon::find($id);
        $coupons->coupon_name = $request->input('coupon_name');
     	$coupons->discaunt = $request->input('discaunt');
     	$coupons->status = $request->input('status') ? $request->input('status'):0;
     	$coupons->save();
     	return redirect('/coupon'); 
     }

     public function delete($id)
     {
     	$coupons = Coupon::findOrFail($id);
     	$coupons->delete();
     	return redirect('/coupon');
     }

     public function unactive($id)
     {
     	Coupon::find($id)->update(['status'=>0]);
     	return redirect('/coupon');
     }

     public function active($id)
     {
     	Coupon::find($id)->update(['status'=>1]);
     	return redirect('/coupon');
     }
}
