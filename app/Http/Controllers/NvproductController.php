<?php

namespace App\Http\Controllers;

use App\Models\nvproduct;
use Illuminate\Http\Request;

class NvproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

        {
            return nvproduct::all();
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
        $nvproduct=new nvproduct();
        $nvproduct->name=$request->input('name');
        $nvproduct->img=$request->file('img')->store('nvproduct');
        $nvproduct->description=$request->input('description');
        $nvproduct->save();
        return $nvproduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nvproduct  $nvproduct
     * @return \Illuminate\Http\Response
     */
    public function show(nvproduct $nvproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nvproduct  $nvproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(nvproduct $nvproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nvproduct  $nvproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nvproduct $nvproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nvproduct  $nvproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=nvproduct::where('id',$id)->delete();
        if($result)
        {
            return["result"=>"Product has been deleted"];
        }
        return "the Product does not exist";
    }
}
