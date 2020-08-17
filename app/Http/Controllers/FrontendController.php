<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Subcategory;
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

    $subcategories=Subcategory::take(3)->get();
   	$items=Item::all();
   	 return view('frontend.items',compact('subcategories','items'));

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

    public function getItems(request $request)
   {
    $sid=$request->sid;
    if($sid==0){
    $items=Item::All();

  }else{
    $items=Subcategory::find($sid)->items;
  }
     return $items;
   }
}
