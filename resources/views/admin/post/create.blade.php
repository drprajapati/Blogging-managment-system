@extends('layouts.app')

@section('content')
    {{--Gives the error when the given data is validated --}}
    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    @endif
<div class="panel panel-default">
    <div class="panel-heading">
        Create a new Post
    </div>
    <div class="panel-body">
        <form action="{{route('posts.store')}}" method = "post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name = "title" class = "form-contrl">
            </div>

            <div class="form-group">
                <label for="featrued">Featured Image</label>
                <input type="text" name = "featured" class = "form-contrl">
            </div>

            <div class="form-group">
                <label for="content">Contenet</label>
                <textarea name="content" id="" cols="5" rows="5" class = "form-control"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success">Share Post</button>
            </div>
        </form>

    </div>
</div>


@endsection

