@extends('layouts.app')



@section('content')
    <div class="card ">
        <div class="card-header">
            <h1> All Users</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>image</th>
                    <th>name</th>
                    <th>permissions</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td><img src="{{ $user->hasimage()  ? $user->getgravatar() : 'images/'.$user->getimage() }}" style="border-radius: 50%;height: 60px;width: 60px;"></td>
                        <td>{{ $user->name }}</td>
                        <td>
                           <div class="row">
                           <div class="col col-6">
                               @if($user->group != 'admin')
                                   <form action="makeAdmin/{{ $user->id }}" method="post">
                                       @csrf
                                       <button type="submit" class="btn btn-primary">make admin</button>
                                   </form>
                               @else
                                   {{ $user->group }}

                               @endif

                           </div>
                              <div class="col col-6">
                                  @if($user->group != 'writer')
                                      <form action="makeUser/{{ $user->id }}" method="post">
                                          @csrf
                                          <button type="submit" class="btn btn-success">make writer</button>
                                      </form>
                                  @else
                                      {{ $user->group }}

                                  @endif
                              </div>
                           </div>
                        </td>


                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection