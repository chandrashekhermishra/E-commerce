<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Products;
use Response;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $allsubcategory =SubCategory::with('sub')->get();

       //dd($allsubcategory);
         $arr=Products::all();
       // $allsubcategory =SubCategory::;
       return view('user.subcategory', compact('allsubcategory','arr'));

       
       // return view('user.subcategory',compact('arr'));
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
        $form_data = array(
            'category_id'=>$request->data1['categoryid'],
            'sub_category'=>$request->data1['subcategory'],
            
        );

        SubCategory::create($form_data);
        
        
        return Response::json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
            $data = SubCategory::findOrFail($id);

            return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       SubCategory::whereId($request->data1['id'])->update(['sub_category'=>$request->data1['subcategory'],'category_id'=>$request->data1['categoryid']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $data = SubCategory::findOrFail($id);
        $data->delete();
    }
}
