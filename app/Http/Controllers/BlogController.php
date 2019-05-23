<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class BlogController extends Controller
{
    protected $limit = 2;

    public function index(){
      $posts = Post::with('author')->latestFirst()->published()->paginate($this->limit);
      return view("index", compact('posts'));
    }

    public function show(Post $post){
      return view('show', compact('post'));
    }
}
