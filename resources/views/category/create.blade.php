@extends('layouts.app')

@section('content')

     @if(session()->has('error'))
     <div class="alert alert-danger">
         {{ session()->get('error') }}
     </div>
     @endif
    <div class="card ">
        <div class="card-header">
            <h1> create category</h1>
        </div>
        <div class="card-body">
          <form action="{{ route('categories.store') }}" method="post">
             @csrf
              <div class="form-group">
                  <label>category name</label>
                  <input type="text" class="form-control" name="name">
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