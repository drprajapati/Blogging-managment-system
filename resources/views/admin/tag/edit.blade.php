@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('tags.update',['id'=>$tags->id])}}" method ="post">
                {{csrf_field()}}
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Tag Name </label>
                        <input type="text" name = "tag"  class="form-control" value = "{{$tags->tag}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type = "submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop