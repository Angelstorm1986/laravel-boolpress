@extends('layouts.admin')

@section('title', 'Post Creation')

@section('content')
    <form action="{{route('admin.posts.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" placeholder="Insert title">
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" class="form-label">Post Content</label>
            <textarea name="content" id="content" cols="140" rows="10" class="@error('content') is-invalid @enderror">{{old('content')}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <h5>Tags</h5>
            @foreach ($tags as $tag)
                <div class="form-check-inline">
                    <input type="checkbox" class="form-check-input" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}} id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
                    <label for="{{$tag->slug}}" class="form-check-label">{{$tag->name}}</label>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-control">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" {{old('published') ? 'checked' : ''}} id="published" name="published">
            <label class="form-check-label" for="published">Published</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection