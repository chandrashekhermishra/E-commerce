<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use App\Products;
use App\ProductItem;
use App\SubCategory;
use Auth;
use Illuminate\Http\Request;
use DB;
use File;
use Validator;
class ProductItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $arr=Products::all();
         $arr1=SubCategory::all();
        return view('user.additem')->with(compact('arr','arr1'));
       // return view('user.additem');
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
        
        $cid=$request->data1['categoryid'];
        $sid=$request->data1['subcategoryid'];
        $pdname=$request->data1['productname'];
        $price=$request->data1['price'];
        $desc=$request->data1['description'];
        $pimage=serialize($request->data1['images']);
        $generated = substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ,mt_rand( 0 ,50 ) ,2 ) .substr( md5( time() ), 1,7);

        DB::table('product_items')->insert([
    [ 
      'user_id'=>Auth::user()->id,
      'category_id' =>$cid,
      'subcategory_id' =>$sid,
        'Pitem_name' =>$pdname,
        'Pprice' =>$price,
        'Psku' => $generated,
        'Pdescription' =>$desc,
        'images' =>$pimage]
   
]);


    return response()->json($pdname);

      
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProductItem $productItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductItem $productItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductItem $productItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductItem $productItem)
    {
        //
    }

    function upload(Request $request)
    {
       $image_code = '';
       $images = $request->file('file');
       foreach($images as $image)
       {
          $new_name = rand() . '.' . $image->getClientOriginalExtension();
           $img = Image::make( $image)->resize(300, 200);
          $image->move(public_path('images'), $new_name);
          $image_code .= '<div id="'.$new_name.'" class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="hovereffect"><img id="imgid" name="'.$new_name.'" src="/images/'.$new_name.'" class="img-responsive" width="300" /><div class="overlay">
          <a class="info" href="#" onclick = "deleteimage()">Delete</a>
          </div>
          </div>
          </div>';
      }

      $output = array(
          'success'  => 'Images uploaded successfully',
          'image'   => $image_code
      );

      return response()->json($output);
  }
  function del(Request $request)
  {

    $name=$request->name;
    $filename = public_path().'/images/'.$name;
    \File::delete($filename);

    return response()->json([
        'success'  => 'Images Deleted successfully',
        'image'   => $name
    ]);
}
}
  //  $new_name = rand() . '.' . $value->getClientOriginalExtension();