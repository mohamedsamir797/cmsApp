<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $user_count = User::all()->count();
        $posts_count = Post::all()->count();
        $categories_count = Category::all()->count();

        return view('dashboard.index',['user_count'=>$user_count,'posts_count'=>$posts_count,'categories_count'=>$categories_count]);
    }
}
