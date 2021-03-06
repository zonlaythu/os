<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
// use App\Category;
class BrandController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
       return view('backend.brands.index',compact('brands'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        return view('backend.brands.create',compact('brands'));
        
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
            
            'name'=>'required',
            'photo'=>'required',

        ]);

        // File Uploaded
        $imageName=time().'.'.$request->photo->extension();

        $request->photo->move(public_path('backend/brandimg'),$imageName);
            $myfile='backend/brandimg/'.$imageName; 

            // Data insert
            $brand=new Brand;   
            $brand->name=$request->name;       
            $brand->photo=$myfile;       
            $brand->save();

            // Redirect
            return redirect()->route('brands.index');  

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::find($id);
        return view('backend.brands.edit',compact('brand'));
        
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
        $request->validate([
            
            'name'=>'required',
            'photo'=>'sometimes',

        ]);

        // File Uploaded
        if($request->hasFile('photo')){
        $imageName=time().'.'.$request->photo->extension();
        $request->photo->move(public_path('backend/brandimg/'),$imageName);
            $myfile='backend/brandimg/'.$imageName; 

            $old=$request->oldphoto;
            unlink($old);
        }else{
           $myfile=$request->oldphoto;
        }
            // Data insert
            $brand=Brand::find($id);   
            $brand->name=$request->name;       
            $brand->photo=$myfile;       

            $brand->save();

            // Redirect
            return redirect()->route('brands.index');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        return redirect()->route('brands.index');
        
    }
}
