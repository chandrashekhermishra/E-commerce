<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	const CATEGORYNAME='name';
  	 protected  $table='product_category';
     protected  $fillable=['id','name'];


   
}

