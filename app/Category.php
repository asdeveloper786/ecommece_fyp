<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function categories(){
    	return $this->hasMany('App\Category','parent_id');
    }
    public static function categoryDashboardCount(){
    	$catCount = Category::count();
    	return $catCount;
    }
}
