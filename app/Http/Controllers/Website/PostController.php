<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(post $post)
    {
        return view('website.post',compact('post'));
    }

    public function getAllPosts()
    {
        return $posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
    } 
}
