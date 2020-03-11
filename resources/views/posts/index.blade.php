@extends('layouts.app')



@section('content')
    <div style="margin-left: 585px;" class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-success ">add new Post</a>
    </div>
    <div class="card ">
        <div class="card-header">
            <h1> All Posts</h1>
        </div>
        <div class="card-body">
            <table class="table">
                  <tr>
                      <th>image</th>
                      <th>title</th>
                      <th>category</th>
                      <th>Action</th>
                  </tr>
                @foreach($posts as $post)
                <tr>
                    <td><img src="images/{{$post->image}}" style="height: 100px;width: 100px;"></td>
                    <td> {{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>

                    <td>
                       <div class="row">
                           @if( !$post->trashed())
                               <a href="{{ route('posts.edit',[$post->id]) }}" class="btn btn-primary mr-3">Edit</a>
                         @else
                               <a href="{{ route('trashed.restore',[$post->id]) }}" class="btn btn-success mr-3">Restore</a>
                           @endif
                           <form action="{{ route('posts.destroy',[$post->id]) }}" method="post">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger">{{ $post->trashed() ? 'Delete':'Trashed' }}</button>
                           </form>
                       </div>
                    </td>
                </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection