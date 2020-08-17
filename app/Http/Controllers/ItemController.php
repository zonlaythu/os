<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\Brand;
use App\Subcategory;
class ItemController extends Controller
{
     public function __construct(){
        $this->middleware('auth')->except('index');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        // dd($items);
        return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands= Brand::all();
        $subcategories=Subcategory::all();
        return view('backend.items.create',compact('brands','subcategories'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $request->validate([
            'codeno'=>'required|min:4',
            'name'=>'required',
            'photo'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'des'=>'required',
            'brand'=>'required',
            'subcategory'=>'required',

        ]);

        // File Uploaded
        $imageName=time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/itemimg'),$imageName);
            $myfile='backend/itemimg/'.$imageName; 

            // Data insert
            $item=new Item;
            $item->codeno=$request->codeno;
            $item->name=$request->name;       
            $item->photo=$myfile;       
            $item->price=$request->price;       
            $item->discount=$request->discount;    
            $item->description=$request->des;    
            $item->brand_id=$request->brand;    
            $item->subcategory_id=$request->subcategory;  
            $item->save();

            // Redirect
            return redirect()->route('items.index');  

           }

    /**
     * Display th
    e specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::find($id);
        return view('backend.items.show',compact('item'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands=Brand::all();
        $subcategories=Subcategory::all();
        $item=Item::find($id);
        return view('backend.items.edit',compact('brands','subcategories','item'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        // dd($request);

        // validation
            $request->validate([
            'codeno'=>'required|min:4',
            'name'=>'required',
            'photo'=>'sometimes',
            'price'=>'required',
            'discount'=>'required',
            'des'=>'required',
            'brand'=>'required',
            'subcategory'=>'required',

        ]);

        // if include file,Uploaded
            if($request->hasFile('photo')){
                $imageName=time().'.'.$request->photo->extension();
                $request->photo->move(public_path('backend/itemimg'),$imageName);
                $myfile='backend/itemimg/'.$imageName;
            // delete old photo(unlink) 
                $old=$request->oldphoto;
                unlink($old);
            }else{
                $myfile=$request->oldphoto;
            }

        // data update
            $item=Item::find($id);
            $item->codeno=$request->codeno;
            $item->name=$request->name;       
            $item->photo=$myfile;       
            $item->price=$request->price;       
            $item->discount=$request->discount;    
            $item->description=$request->des;    
            $item->brand_id=$request->brand;    
            $item->subcategory_id=$request->subcategory;  
            $item->save();

        // redirect
         return redirect()->route('items.index');  

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $item=Item::find($id);
     $item->delete();

    return redirect()->route('items.index');  
     
    }
}
