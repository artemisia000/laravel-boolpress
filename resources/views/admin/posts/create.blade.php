@extends('layouts.app')

@section('content')
     <div class="container">
        <h1 class="mt-5">Create New Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif

        <form action=" {{ route('admin.posts.store')}} " method="POST">
            @csrf 

            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                   <div class="text-info">{{ $message }}</div>
                @enderror

                <label for="description" class="form-label">Text</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="7">{{ old('description')}} </textarea>
            </div>
            @error('description')
                   <div class="text-info">{{ $message }}</div>
                @enderror

            <button class="btn btn-primary mt-3" type="submit">
                Create a new post
            </button>

        </form>
     </div>
@endsection