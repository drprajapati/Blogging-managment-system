@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('user.profile.update')}}" method ='post'>
                {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">User Name </label>
                        <input type="text" name = "name" value="{{$user->name}} "  class="form-control" placeholder="Enter the name of user">
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" name = "email"  value="{{$user->email}} " class="form-control" placeholder="abc@example.com">
                    </div>
                    <div class="form-group">
                        <label for="password">New Password </label>
                        <input type="password" name = "password"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Upload new avatar </label>
                        <input type="file" name = "avatar"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook profile</label>
                        <input type="text" name = "facebook"  value = "{{$user->facebook}}"class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="avatar">Youtube Profile </label>
                        <input type="text" name = "youtube" value ="{{$user->youtube}}" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="about">About you</label>
                        <textarea name="about" id="about" cols="5" rows="5" value = "{{$user->about}}" class = 'form-control'></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type = "submit">Update User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop