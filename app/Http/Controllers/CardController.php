<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Coupon;
use Session;

class CardController extends Controller
{
    public function addToCard(Request $request, $id)
    {
    	/*echo request()->ip();
    	die();*/
    	$check = Card::where('product_id',$id)->where('user_ip', request()->ip())->first();
    	if ($check) {
    		Card::where('product_id', $id)->increment('qty');
    		return redirect()->back();
    	}
    	else{
    		Card::insert([
    		'product_id' => $id,
    		'qty' =>1,
    		'price' => $request->input('price'),
    		'user_ip' => request()->ip(),
    	]);	
    	}
    	
    	return redirect()->back();
    }

    public function shopping_cart()
    {
    	$cards = Card::where('user_ip', request()->ip())->get();
      $subtotal = Card::all()->where('user_ip', request()->ip())->sum(function($t){
        return $t->price * $t->qty;
      });
    	return view('pages.shopping_card', compact('cards', 'subtotal'));
    }

    public function delete($id)
   	  {
   	$card = Card::where('id',$id)->where('user_ip', request()->ip())->delete();
   	return redirect()->back();
   	  }

   	  public function updateQuantity(Request $request, $id)
   	  {
   	  	Card::where('id', $id)->where('user_ip', request()->ip())->update([
   	  		'qty' =>$request->qty,
   	  	]);

   	  	return redirect()->back();
   	  }

   	  public function couponApply(Request $request)
   	  {
   	  	$check = Coupon::where('coupon_name', $request->coupon_name)->first();
        if ($check) {
          Session::put('coupon',[
            'coupon_name' => $check->coupon_name,
            'coupon_discaunt' => $check->discaunt,
          ]);
          return redirect()->back();
        }
        else{
          return redirect()->back();
        }
   	  }
}
