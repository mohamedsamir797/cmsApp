@extends('layouts.app')

@section('content')
    <div class="container">
               <div class="row text-center">
                   <div class="col col-4">
                       <div class="card bg-info text-white">
                           <div class="card-header ">
                               users
                           </div>
                           <div class="card-body">
                               {{ $user_count }}
                           </div>
                       </div>
                   </div>
                   <div class="col col-4">
                       <div class="card bg-danger text-white">
                           <div class="card-header ">
                               posts
                           </div>
                           <div class="card-body">
                               {{ $posts_count }}
                           </div>
                       </div>
                   </div>
                   <div class="col col-4">
                       <div class="card bg-success text-white">
                           <div class="card-header ">
                               categories
                           </div>
                           <div class="card-body">
                               {{ $categories_count }}
                           </div>
                       </div>
                   </div>

        </div>
    </div>
@endsection
