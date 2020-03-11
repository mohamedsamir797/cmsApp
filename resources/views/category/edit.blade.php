@extends('layouts.app')

@section('content')

    <div class="card ">
        <div class="card-header">
            <h1> create category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update',[$categories->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>category name</label>
                    <input type="text" class="form-control" name="name" value="{{ $categories->name }}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>

@endsection