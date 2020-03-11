<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class articalController extends Controller
{
    public function index(){
        $posts = Post::all();
        if (request()->has('search') && request()->get('search') != ''){
            $posts = Post::where('title','LIKE','%'.request()->get('search').'%')->get();
        }
        return view('articale.index',['posts'=>$posts]);
    }
}
