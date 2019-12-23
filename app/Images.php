<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table='product_images';
    protected $fillable=['angle1','angle2','angle3','angle4','angle5','angle6'];
}
