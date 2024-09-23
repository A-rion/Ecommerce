<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class UserController extends Controller
{
    public function home(){

		return view('home.home');

	}
	public function productlist(){
		return view('productlist.productlist');
	}
	public function productdetail(){
		return view('productdetail.productdetail');
	}
	public function cart(){
		return view('cart.cart');
	}
	public function checkout(){
		return view('checkout.checkout');
	}
	public function myaccount(){
		return view('myaccount.myaccount');
	}
	public function wishlist(){
		return view('wishlist.wishlist');
	}
	public function login(){
		return view('login.login');
	}
	public function contact(){
		return view('contact.contact');
	}
	public function register(){
		return view('register.register');
	}

	public function registerSubmit(Request $request){
		$userFname = $request->input('userFname');
		$userLname = $request->input('userLname');
		$userEmail = $request->input('userEmail');
		$userPhone = $request->input('userPhone');
		$userPassword = $request->input('userPassword');
		$retypePassword = $request->input('retypePassword');
		// echo $userFname;
		if($userPassword === $retypePassword) {
			$insertSQL = DB::table('user')->insert([
				"fname" => $userFname,
				"lname" => $userLname,
				"email"=> $userEmail,
				"mobile"=> $userPhone,
				"password"=> $userPassword,
			]);
			if($insertSQL){
				echo "Account Successfully Created.";
			}
		} else {
			echo "Passwords Do Not Match.";
		}
	}
}
