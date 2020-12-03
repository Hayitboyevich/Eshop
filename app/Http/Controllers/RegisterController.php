<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use Session;
class RegisterController extends Controller
{
    public function loginPage()
    {
    	return view('pages.login');
    }
    public function register(Request $request)
    {
    	$customers = new Register;
    	$customers->customer_name = $request->input('customer_name');
    	$customers->customer_email = $request->input('customer_email');
    	$customers->customer_phone = $request->input('customer_phone');
    	$customers->password = md5($request->input('password'));
    	$customers->save();
    	Session::put('id', $customers->id);
    	return redirect('/customer-checkout');

    }

    public function login(Request $request)
    {
    	$customer_email = $request->input('customer_email');
    	$password = md5($request->input('password'));
    	$result = Register::where('customer_email', $customer_email)
    						->where('password', $password)
    						->first();
    	if ($result) {
    		return redirect('/customer-checkout');
    		Session::put('id', $result->id);
    	}
    	else{
    		return redirect()->back();
    	}
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('/')->send();
    }

    public function checkout()
    {
    	return view('pages.checkout');
    }
}
