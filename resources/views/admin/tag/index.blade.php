@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <th>Tag Name</th>
                <th>Deleting</th>
                <th>Updating</th>
                </thead>
                <tbody>
                @if($tags->count() > 0)
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->tag}}
                            </td>
                            <td>
                                <a href="{{route('tags.delete',['id'=>$tag->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                            <td>
                                <a href="{{route('tags.edit',['id'=>$tag->id])}}" class="btn btn-xs btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            No Tags Yet
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@stop