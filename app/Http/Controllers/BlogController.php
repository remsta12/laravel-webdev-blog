<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class BlogController extends Controller
{
    protected $limit = 2;

    public function index(){
      $posts = Post::with('author')->latestFirst()->paginate($this->limit);
      return view("index", compact('posts'));
    }

    public function show($id){
      $post = Post::findOrFail($id);
      return view('show', compact('post'));
    }
}
