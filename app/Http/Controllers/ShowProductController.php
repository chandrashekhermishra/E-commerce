<?php

namespace App\Http\Controllers;
use App\Products;
use App\ProductItem;
use App\SubCategory;
use App\ShowProduct;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $productview =ProductItem::with('category','subcategory','userdetails')->where('id',$id)->get();

        return view('admin.seeproduct', compact('productview'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShowProduct  $showProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ShowProduct $showProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShowProduct  $showProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowProduct $showProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShowProduct  $showProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShowProduct $showProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShowProduct  $showProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowProduct $showProduct)
    {
        //
    }
}
