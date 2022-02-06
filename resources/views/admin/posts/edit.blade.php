@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">Edit {{ $post->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <form action=" {{ route('admin.posts.update', $post->id) }}" method="post" method="POST">
        @csrf 



        <div class="mb-4 mt-3">
          <h6>Tags</h6>

          @foreach ( $tags as $tag ) 
             <span>
                 <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}"
                      @if( $errors->any() && in_array($tag->id, old('tags'))) 
                      checked
                      @elseif(!$errors->any() && $post->$tags->contains($tag->id))
                      checked 
                      @endif>
                      
                 <label for="tag" {{ $loop->iteration }}>
                    {{ $tag->name }}
                 </label>
             </span>
          @endforeach
          @error('tags')
             <div class="text-info">{{ $message }}</div>
          @enderror
      </div>


          <button class="btn btn-primary mt-3" type="submit">
                Create a new post
          </button>
       </form>
      </div>
@endsection      