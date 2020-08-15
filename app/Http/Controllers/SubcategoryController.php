<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=Subcategory::All();
        $categories=Category::All();
        return view('backend.subcategories.index',compact('subcategories','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('backend.subcategories.create',compact('subcategories','categories'));
        
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
            'category'=>'required',

        ]);

            // Data insert
            $sub=new Subcategory;        
            $sub->name=$request->name;                       
            $sub->category_id=$request->category;  
            $sub->save();

            // Redirect
            return redirect()->route('subcategories.index');  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory=Subcategory::find($id);
        $categories=Category::all();
        return view('backend.subcategories.edit',compact('subcategory','categories'));       
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
            'category'=>'required',

        ]);

            // Data insert
            $sub=Subcategory::find($id);      
            $sub->name=$request->name;                       
            $sub->category_id=$request->category;  
            $sub->save();

            // Redirect
            return redirect()->route('subcategories.index');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategories=Subcategory::find($id);
        $subcategories->delete();
        return redirect()->route('subcategories.index');
    }
 
}
