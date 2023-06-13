<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =(new Product())->paginate(10);
        return response()->json(['status'=>1,'data'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $product = new Product();
        $product->pro_name= $request->input('pro_name');
        $product->pro_slug= $request->input('pro_slug');
        $product->pro_desc= $request->input('pro_desc');

        $product->pro_size= $request->input('pro_size');
        $product->pro_color= $request->input('pro_color');
        $product->pro_price= $request->input('pro_price');

        $product->pro_stock= $request->input('pro_stock');


        if($request->hasFile('pro_img')){
            $image2=$request->file('pro_img');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/images');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }
//        dd($image_path);

        $product->pro_img= $reFullImage;
        $product->pro_status= $request->input('pro_status');
        $product->save();
        return response()->json(['status'=>1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = new Product();
        $productData=$product->find($id);
        return response()->json(['status'=>1,'data'=>$productData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = new Product();
        $productData=$product->find($id);
        return response()->json(['status'=>1,'data'=>$productData]);
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
        $product =Product::find($id);
        $product->pro_name= $request->input('pro_name');
        $product->pro_slug= $request->input('pro_slug');
        $product->pro_desc= $request->input('pro_desc');

        $product->pro_size= $request->input('pro_size');
        $product->pro_color= $request->input('pro_color');
        $product->pro_price= $request->input('pro_price');

        $product->pro_stock= $request->input('pro_stock');
        if($request->hasFile('pro_img')){
            $image2=$request->file('pro_img');
            $reFullImage=time().'.'.$image2->getClientOriginalExtension();
            $dest2=public_path('/images');
            $image2->move($dest2,$reFullImage);
        }else{
            $reFullImage='na';
        }
//        dd($image_path);

        $product->pro_img= $reFullImage;
        $product->pro_status= $request->input('pro_status');
        $product->update();
        return response()->json(['status'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = new Product();
        if($obj->where('id', $id)->delete())
        {
            return response()->json(['status'=>1]);
        }else
        {
            return response()->json(['status'=>0]);
        }
    }
}
