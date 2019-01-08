<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	 protected $dates = [
        'created_at',
        'updated_at',
       
    ];
	 public function tags()
    {
    	return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id')->withTimestamps();
    } 
    public function categories()
    {
    	return $this->belongsToMany('App\Category','category_posts','post_id','category_id')->withTimestamps();
    }
    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
    
}
