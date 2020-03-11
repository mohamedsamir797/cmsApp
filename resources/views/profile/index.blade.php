@extends('layouts.app')

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="card ">
        <div class="card-header">
            <h1> Profile</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update',[$profile->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>name</label>
                    <input type="text" class="form-control" name="title" value="{{ $profile->user->name }}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>email</label>
                    <input type="text" class="form-control" name="desc" value="{{ $profile->user->email }}">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>about</label>
                    <textarea name="about" class="form-control">{{ $profile->about }}</textarea>
                </div>
                @error('about')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label>facebook</label>
                    <textarea name="facebook" class="form-control">{{ $profile->facebook }}</textarea>
                </div>

                <div class="form-group">
                    <label>twitter</label>
                    <textarea name="twitter" class="form-control">{{ $profile->twitter }}</textarea>
                </div>

                <div class="form-group">
                    <label>image</label>
                    <img src="{{ $user->hasimage()  ? $user->getgravatar() : '/images/'.$profile->image }}" style="border-radius: 50%;height: 60px;width: 60px;">
                    <input type="file" class="form-control" name="image">
                </div>

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
