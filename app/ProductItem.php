<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
	const USERID='user_id';
	const SUBCATEGORYID='subcategory_id';
	const CATEGORYID='category_id';
	const PRODUCTNAME='Pitem_name';
	const PRICE='Pprice';
	const SKU="Psku";
	const DESCRIPTION='Pdescription';
	const PRODUCTIMAGES='images';
	protected $fillable=['subcategory_id','category_id','Pitem_name','Pprice','Psku','Pdescription','images'];

	public function category()
	{

		return $this->belongsTo('App\Products','category_id');
	}
	
	public function subcategory()
	{
		return $this->belongsTo('App\SubCategory','subcategory_id');
	}

	public function userdetails()
	{
		return $this->belongsTo('App\User','user_id');
	}
}
