<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('categories:id,name')
        ->get();
    }
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
        $product=new product();
        $product->name=$request->input('name');
        $product->slug=$request->input('name');

        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->img=$request->file('img')->store('product');
        $product->category_id=$request->input('category_id');
        $product->save();
        return $product;
    }



    public function destroy($id)
    {
        $result=product::where('id',$id)->delete();
        if($result)
        {
            return["result"=>"product has been deleted"];
        }
        return "the product does not found";
    }
}
