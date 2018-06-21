@extends('layouts.app')

@section('content')
    {{--Gives the error when the given data is validated --}}
   @include('error.error')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Create a new Post</h2>
    </div>
    <div class="panel-body">
        <form action="{{ route('post.store') }}" method = 'post' enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name = "title" class = "form-control">
            </div>

            <div class="form-group">
                <label for="category">Select Category</label>
                <select name="category_id" id="category" class="from-control">
                    @foreach($categories  as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tag">Select a tag</label>
                @foreach($tags as $tag)
                    <div class="checkbox">
                        <label><input type="checkbox" name = "tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name = "featured" class = "form-control" >
            </div>

            <div class="form-group">
                <label for="contents">Content</label>
                <textarea  name="contents" id = "contents"cols="5" rows="5" class="form-control"
                       placeholder="Enter your content here"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type = "submit">Share Post</button>
            </div>
        </form>

    </div>
</div>

@endsection

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#contents').summernote();
    });
</script>
@stop