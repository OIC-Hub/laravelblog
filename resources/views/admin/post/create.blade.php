@extends('admin.app')
@section('title', 'Create Post page')
@section('content')
<h2> Create Post Page</h2>
<div class="container"></div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
          @if($errors->any())
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong> Opps!!! </strong> <br>
            @foreach($errors->all() as $error)
             {{$error}} 
            @endforeach
          </div>
          @endif
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
<form method="post" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
      <label for="">Picture</label>
      <input type="file" class="form-control-file" name="picture" id=""  aria-describedby="fileHelpId">
    </div>
<div class="form-group mb-3">
  <label for="">Title</label>
  <input type="text" name="title" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{old('title')}}">
  @error('title')
    <strong>{{ $message }}</strong>
        @enderror
</div>

<div class="form-group mb-3">
  <label for=""> Body</label>
  <textarea class="form-control @error('title') is-invalid @enderror" name="body" id="" rows="3">{{old('body')}}</textarea>
  @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
</div>
<button class="btn btn-warning" type="submit">Post</button>

</form>
</div>
    </div>
</div>
</div>
@endsection