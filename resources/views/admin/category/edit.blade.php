@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('category.update',['id'=>$category->id])}}" method ="post">
                {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Category Name </label>
                        <input type="text" name = "name"  class="form-control" value = "{{$category->name}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type = "submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop