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
                @if('$categories->count()'>0)
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

                @else
                    <tr>
                        <td>No Categories are yet</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop