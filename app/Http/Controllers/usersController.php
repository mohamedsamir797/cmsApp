<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function makeAdmin($id){
        $user =  User::findOrFail($id);
        $user->group = 'admin';
        $user->save();

        return back();
    }
    public function makeUser($id){
        $user =  User::findOrFail($id);
        $user->group = 'writer';
        $user->save();

        return back();
    }
    public function profileEdit($id){
        $user = User::find($id);
        $profile = Profile::find($id);
        return view('profile.index',['user'=>$user,'profile'=>$profile]);
    }
    public function profileUpdate(Request $request,$id){

        if ($request->hasFile('image')){
            $imagename = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('/images',$imagename);
            $prof = User::find($id)->profile;
            $prof->about = $request->about;
            $prof->facebook = $request->facebook;
            $prof->twitter = $request->twitter;
            $prof->image = $imagename;
            $prof->save();
        }else{
            $prof = User::find($id)->profile;
            $prof->about = $request->about;
            $prof->facebook = $request->facebook;
            $prof->twitter = $request->twitter;
            $prof->save();
        }



        return back();

    }
}
