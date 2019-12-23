<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	const CATEGORYID='category_id';
	const SUBCATEGORY='sub_category';
   protected $table='subcategory';
   protected $fillable=['category_id','sub_category'];


public function sub(){

	 return $this->belongsTo('App\Products','category_id');
}
}
