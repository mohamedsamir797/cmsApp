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
            <form action="{{ route('posts.update',[$posts->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>title</label>
                    <input type="text" class="form-control" name="title" value="{{ $posts->title }}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control" name="desc" value="{{ $posts->desc }}">
                </div>
                @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>content</label>
                    <textarea name="content" class="form-control">{{ $posts->content }}</textarea>
                </div>
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>select category</label>
                    <select name="cat_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if($category->id == $posts->cat_id )
                                selected
                                @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                @error('cat_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @if(!$tags->count() <= 0)
                    <div class="form-group">
                        <label>select category</label>
                        <select name="tags[]" multiple class="form-control tags">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                @if($posts->hasId($tag->id))
                                   selected
                                    @endif
                                >{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif


                <div class="form-group">
                    <label>image</label>
                    <input type="file" class="form-control" name="image">
                    <img src="/images/{{ $posts->image }}" style="height: 100px;width: 100px;">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
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
