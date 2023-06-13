<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $category =(new Category)->paginate(10);
       return response()->json(['status'=>1,'data'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('admin.category.form');
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
            'cat_name'=>'required',
            'cat_slug'=>'required',
        ]);
        $category = new Category();
        $category->cat_name= $request->input('cat_name');
        $category->cat_slug= $request->input('cat_slug');
        $category->cat_status= $request->input('cat_status');
        $category->save();
        return response()->json(['status'=>1]);
//        $request->validate([
//            'name'=>'required',
//            'description'=>'required',
//            'slug'=>'required',
//            'price'=>'required'
//
//
//        ]);
//        return Category::create($request->all());
//        $category =(new Category)->paginate(10);
//        return response()->json(['status'=>1,'data'=>$category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = new Category();
        $categoryData=$category->find($id);
        return response()->json(['status'=>1,'data'=>$categoryData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = new Category();
        $categoryData=$category->find($id);
        return response()->json(['status'=>1,'data'=>$categoryData]);
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
            'cat_name'=>'required',
            'cat_slug'=>'required',
        ]);
        $category= Category::find($id);
        $category->cat_name= $request->input('cat_name');
        $category->cat_slug= $request->input('cat_slug');
        $category->cat_status= $request->input('cat_status');
        $category->update($id,$category->all());
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
