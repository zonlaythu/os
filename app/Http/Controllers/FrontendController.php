<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
// use App\User;
class FrontendController extends Controller
{
   public function home()
   {
   	$items=Item::orderBy('id','desc')->take(6)->get();
   	// dd($items);
   	 return view('frontend.home',compact('items'));

   }

    public function item()
   {
   	$items=Item::all();
   	 return view('frontend.items',compact('items'));

   }

     public function about()
   {
   	
   	 return view('frontend.about');
   }

    public function contact()
   {
   	
   	 return view('frontend.contact');
   }

    public function checkout()
   {
   	  $items=Item::all();
   	 return view('frontend.checkout',compact('items'));
   }

    public function register()
   {
   	
   	 return view('frontend.register');
   }

    public function login()
   {
   	
   	 return view('frontend.login');
   }

    public function detail($id)
   {
   	 $item=Item::find($id);
   	 return view('frontend.detail',compact('item'));
   }

    public function profile()
   {
    
   	 return view('frontend.profile');
   }
}
