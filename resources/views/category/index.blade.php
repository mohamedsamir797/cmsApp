@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div style="margin-left: 585px;" class="mb-4">
        <a href="{{ route('categories.create') }}" class="btn btn-success ">add new category</a>
    </div>
    <div class="card ">
         <div class="card-header">
             <h1> All categories</h1>
         </div>
         <div class="card-body">
             <table class="table">
                 <tr>
                     <th>name</th>
                     <th>action</th>

                 </tr>
                 @foreach($categories as $category)
                     <tr>
                         <td>{{ $category->name }}</td>
                         <td>
                             <div class="row">
                                 <a href="{{ route('categories.edit',[$category->id ]) }}" class="btn btn-outline-primary">edit</a>

                                 <form action="{{ route('categories.destroy',[$category->id]) }}" method="post">
                                    @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-outline-danger ml-3">Delete</button>
                                 </form>
                             </div>
                         </td>
                    </tr>
                 @endforeach

             </table>
         </div>
    </div>

    @endsection