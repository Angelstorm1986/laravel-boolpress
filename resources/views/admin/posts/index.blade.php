@extends('layouts.admin')

@section('title', 'Post List')

@section('content')
  <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create new Post</a>
  <a href="{{route('admin.home')}}" class="btn btn-primary">Return to Home</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Creation date</th>
        <th scope="col">Modify</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td>
            <a href="{{route('admin.posts.show', $post->id)}}">{{$post->id}}</a>
          </td>
          <td>
            <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
          </td>
          <td>{{$post->created_at}}</td>
          <td>
            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
          </td>
          <td>
            <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $posts->links() }}
@endsection