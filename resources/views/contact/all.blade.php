@extends('layouts.app')



@section('content')

    <div class="card ">
        <div class="card-header">
            <h1> All Contacts messages</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>name</th>
                    <th>subject</th>
                    <th>email</th>
                </tr>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name }}</td>
                        <td> {{ $contact->subject }}</td>
                        <td>{{ $contact->email }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection