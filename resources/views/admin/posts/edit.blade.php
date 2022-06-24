@extends('layouts.admin')

@section('title', 'Modify Post')

@section('content')
    <form action="{{route('admin.posts.update', $post->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}" placeholder="Insert title">
            @error('title')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" class="form-label">Post Content</label>
            <textarea name="content" id="content" cols="150" rows="10" class="@error('content') is-invalid @enderror">{{old('content', $post->content)}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-control">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" {{old('published', $post->published ) ? 'checked' : ''}} id="published" name="published">
            <label class="form-check-label" for="published">Published</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection