<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsComment extends Model
{
    public static function commentDashboardCount(){
    	$comCount = ProductsComment::count();
    	return $comCount;
    }
}
