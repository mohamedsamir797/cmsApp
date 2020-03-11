<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class AboutController extends Controller
{
    public function index(){
        return view('about.index');
    }
}
