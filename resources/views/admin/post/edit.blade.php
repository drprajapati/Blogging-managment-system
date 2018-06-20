@extends('layouts.app')

@section('content')
    {{--Gives the error when the given data is validated --}}
    @include('error.error')
    <div class="panel panel-default">
        <hr>
        <div class="panel-heading">
            <h4>Post Title: </h4> {{$posts->title}}
        </div>
        <hr>
        <div class="panel-body">
            <form action="{{ route('posts.update',['id'=>$posts->id]) }}" method='post' enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$posts->title}}">
                </div>

                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="from-control">
                        @foreach($categories  as $category)
                            <option value="{{$category->id}}"
                                    @if($posts->category->id == $category->id)
                                        selected
                                    @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tag">Select a tag</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                          @foreach($posts->tags as $t)
                                          @if($tag->id == $t->id)
                                          checked
                                        @endif
                                        @endforeach

                                >{{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>

                <div class="form-group">
                    <label for="contents">Content</label>
                    <textarea name="contents" cols="5" rows="5" class="form-control">{{$posts->contents}}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </form>

        </div>
    </div>


@endsection

