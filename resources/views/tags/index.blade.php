@extends('layouts.app')


@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div style="margin-left: 585px;" class="mb-4">
        <a href="{{ route('tags.create') }}" class="btn btn-success ">add new tags</a>
    </div>
    <div class="card ">
        <div class="card-header">
            <h1> All Tags</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>name</th>
                    <th>action</th>

                </tr>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->name }}
                            <span class=" ml-2 badge badge-primary">{{ $tag->posts->count() }}</span>
                        </td>
                        <td>
                            <div class="row">
                                <a href="{{ route('tags.edit',[$tag->id ]) }}" class="btn btn-outline-primary">edit</a>

                                <form action="{{ route('tags.destroy',[$tag->id]) }}" method="post">
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