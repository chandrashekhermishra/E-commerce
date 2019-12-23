<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Products;
use App\ProductItem;
use Redirect,Response;
use DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $allcategory =Products::paginate(15);
       return view('user.addcategory', compact('allcategory'));
      
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
            'name'=>$request->data1['category']
        );

        Products::create($form_data);
        $all=Products::orderBy('id', 'ASC')->get();
        return Response::json($all);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    { 
        

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
            $data = Products::findOrFail($id);

            return response()->json($data);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
         Products::whereId($request->data1['id'])->update(['name'=>$request->data1['name']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $data = Products::findOrFail($id);
        $data->delete();
    }
}
