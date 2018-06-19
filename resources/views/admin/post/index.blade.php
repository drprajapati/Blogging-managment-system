@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            Image
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                            <a href="" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-xs btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop