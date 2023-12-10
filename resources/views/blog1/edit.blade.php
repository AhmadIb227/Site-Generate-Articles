@extends('layout1.appar')
@section('content')
  <form method="post" action="{{route('blog.update',$post->id)}}" enctype="multipart/form-data">
     @csrf
     <div class="container">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title',$post->title) }}">
          @error('title')
            <p style="color: red">{{ $message }}</p>
          @enderror
          
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3">
                {{ old('body', $post->body) }}
            </textarea>   
            
            @error('body') 
              <p style="color: red">{{ $message }}</p>
            @enderror
        </div>  
        <div class="mb-3">
            <label for="image" class="form-label"> Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Send</button>
     </div>
  </form>
@endsection