<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
