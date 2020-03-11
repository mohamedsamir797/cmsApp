@extends('layouts.app')

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="card ">
        <div class="card-header">
            <h1> create new Post</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" name="desc">
                </div>
                @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>content</label>
                    <input id="x" type="hidden" name="content">
                    <trix-editor input="x"></trix-editor>
                </div>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <label>image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>select category</label>
                    <select name="cat_id" class="form-control">
                        @foreach($categories as $category)
                       <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                    </select>
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if(!$tags->count() <= 0)
                <div class="form-group">
                    <label>select category</label>
                    <select name="tags[]" multiple class="form-control tags">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('link')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tags').select2();
        });
    </script>
@endsection
