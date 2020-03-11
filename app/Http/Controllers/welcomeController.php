<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('welcome',['posts'=>$posts]);
    }
}
