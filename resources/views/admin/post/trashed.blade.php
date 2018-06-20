@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Restore</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{$post->featured}}" alt="{{$post->title}}" width="80px" height="80px">
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a href="{{route('posts.restore',['id'=>$post->id])}}" class="btn btn-xs btn-success">Restore</a>
                        </td>
                        <td>
                            <a href="{{route('posts.kill',['id'=>$post->id])}}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop