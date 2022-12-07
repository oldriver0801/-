<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return $post->get();
    } 
    
    public function test(Post $post)
    {
        return view('posts/test') ->with(['neko' => $post->get()]);
    } 
}