<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\ProductItem;
class HomeViewController extends Controller
{
     public function index()

    {
       $allproducts =ProductItem::paginate(15);
       return view('admin.index', compact('allproducts'));
    }
}
