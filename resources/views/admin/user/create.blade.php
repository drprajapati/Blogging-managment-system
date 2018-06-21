@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('users.store')}}" method ='post'>
                {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">User Name </label>
                        <input type="text" name = "name"  class="form-control" placeholder="Enter the name of user">
                    </div>
                    <div class="form-group">
                        <label for="name">Email </label>
                        <input type="email" name = "email"  class="form-control" placeholder="abc@example.com">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type = "submit">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop