<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::with('user.profile')->where('status',1)->orderBy('created_at','DESC')->paginate(5);
       
    	return view('website.blog',compact('posts'));
    }
    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('website.blog',compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('website.blog',compact('posts'));
    }
}
