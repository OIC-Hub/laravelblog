@extends('admin.app')
@section('title', 'Post page')
@section('content')
<h2>Post Page</h2>
<a href="{{route('admin.post.create')}}" class="btn btn-primary m-4">Add Post</a>
@if(count($posts) >0)
<table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
        $i=1
        @endphp
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>Mark</td>
      <td>{{$post->title}}</td>
      <td>{{$post->body}}</td>
       <td>
      <a href="" class="btn btn-success">Edit</a> || <a href="" class="btn btn-danger">Delete</a>

       </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@endsection