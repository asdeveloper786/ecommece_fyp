<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function Blog(){
    	return $this->hasMany('App\Blog');
    }
    public function blogComments(){
    	return $this->hasMany('App\BlogsComment','blog_id');
    }
}
