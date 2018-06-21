@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>User Name</th>
                <th>Permissions</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ asset('$user->profile->avatar')}}"  width="80px" height="80px">
                            </td>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                @if($user->admin)
                                    <a href="{{route('users.not_admin',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Remove permissions</a>
                                @else
                                    <a href="{{route('users.admin',['id'=>$user->id])}}" class="btn btn-xs btn-success">Make admin</a>
                                @endif
                            </td>
                            <td>
                                @if(Auth::id()!=$user->id)
                                <a href="{{route('users.delete',['id'=>$user->id])}}" class="btn btn-xs btn-danger">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            No User Yet
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop