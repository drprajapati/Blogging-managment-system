@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Trash</th>
                <th>Edit</th>
                </thead>
                <tbody>
                @if($posts->count()>0)
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{$post->featured}}" alt="{{$post->title}}" width="80px" height="80px">
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a href="{{route('posts.delete',['id'=>$post->id])}}" class="btn btn-xs btn-danger">Trash</a>
                        </td>
                        <td>
                            <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-xs btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach

                @else
                    <tr>
                        <td>No Posts are yet</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop