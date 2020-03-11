<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Profile;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('checkCategories')->only('create');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags= Tag::all();
        $categories = Category::all();
        return view('posts.create',['categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title'=>'required',
            'desc'=>'required',
            'content'=>'required',
            'image'=>'required',
            'cat_id'=>'required'
        ]);

        $imagename = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('images',$imagename);

        $posts = new Post;
        $posts->title = $request->title;
        $posts->desc = $request->desc;
        $posts->cat_id = $request->cat_id;
        $posts->content = $request->content;
        $posts->user_id = $request->user_id;
        $posts->image = $imagename ;

        $posts->save();

        if ($request->tags){
            $posts->tags()->attach($request->tags);

        }

        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recentPosts = Post::take(3)->latest()->get();
        $comments = Comment::where('post_id',$id)->get();
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.show',['post'=>$post,'categories'=>$categories,'comments'=>$comments,'recentPosts'=>$recentPosts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags= Tag::all();
        $posts = Post::findOrFail($id);
        $categories = Category::all();

        return view('posts.edit',['posts'=>$posts,'categories'=>$categories,'tags'=>$tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title'=>'required',
            'desc'=>'required',
            'content'=>'required',
        ]);

         if ($request->hasFile('image')){
             $imagename = $request->file('image')->getClientOriginalName();
             $request->file('image')->move('images',$imagename);

             $posts = Post::findOrFail($id);
             $posts->title = $request->title;
             $posts->desc = $request->desc;
             $posts->content = $request->content;
             $posts->cat_id = $request->cat_id;
             $posts->image = $imagename ;
             $posts->save();
         }else{
             $posts = Post::findOrFail($id);
             $posts->title = $request->title;
             $posts->desc = $request->desc;
             $posts->content = $request->content;
             $posts->cat_id = $request->cat_id;
             $posts->save();
         }
        if ($request->tags){
            $posts->tags()->sync($request->tags);

        }

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();
        if ($posts->trashed()){
            $posts->forceDelete();
        }else{
            $posts->delete();
        }
        return back();

    }
    public function trashed(){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trashed);
    }
    public function restore($id){
        Post::withTrashed()->where('id',$id)->restore();
        return back();
    }
}
