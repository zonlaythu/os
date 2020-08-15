<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::All();
        return view('backend.categories.index',compact('categories'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('backend.categories.create',compact('categories'));
        
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

        $request->photo->move(public_path('backend/categoryimg/'),$imageName);
            $myfile='backend/categoryimg/'.$imageName; 

            // Data insert
            $category=new Category;   
            $category->name=$request->name;       
            $category->photo=$myfile;       
 
            $category->save();

            // Redirect
            return redirect()->route('categories.index');  

        
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
        $categories=Category::find($id);
        return view('backend.categories.edit',compact('categories'));
        
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
        $request->photo->move(public_path('backend/categoryimg/'),$imageName);
            $myfile='backend/categoryimg/'.$imageName; 

            $old=$request->oldphoto;
            unlink($old);
        }else{
           $myfile=$request->oldphoto;
        }
            // Data insert
            $category=Category::find($id);   
            $category->name=$request->name;       
            $category->photo=$myfile;       

            $category->save();

            // Redirect
            return redirect()->route('categories.index');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $categories=Category::find($id);
        $categories->delete();
        return redirect()->route('categories.index');
    }
}
