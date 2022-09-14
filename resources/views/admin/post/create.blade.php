@extends('admin.app')
@section('title', 'Create Post page')
@section('content')
<h2> Create Post Page</h2>
<div class="container"></div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{session('success')}}</strong> 
            </div>
            @endif
            
            <script>
              $(".alert").alert();
            </script>
            <div class="card">
<form method="post" action="{{route('admin.post.store')}}">
    @csrf
    <div class="form-group mb-3">
      <label for="">Picture</label>
      <input type="file" class="form-control-file" name="picture" id=""  aria-describedby="fileHelpId">
    </div>
<div class="form-group mb-3">
  <label for="">Title</label>
  <input type="text" name="title" id="" class="form-control" placeholder="Title" value="{{old('title')}}">
</div>
<div class="form-group mb-3">
  <label for=""> Body</label>
  <textarea class="form-control" name="body" id="" rows="3">{{old('body')}}</textarea>
</div>
<button class="btn btn-warning" type="submit">Post</button>
</form>
</div>
    </div>
</div>
</div>
@endsection