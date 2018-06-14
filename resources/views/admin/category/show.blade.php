@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <th>Category</th>
                <th>Delete</th>
                <th>Update</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->name}}
                        </td>
                        <td>
                            <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                            <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-xs btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop