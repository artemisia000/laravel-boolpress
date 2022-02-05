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

             {{--CATEGORIES--}}
                <div>
                    <label for="id" class="mt-3" >Category</label>
                    <select class="form-control" name="id" id="id">
                        <option value="">Uncategorized</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($category->id == old('id'))selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="text-info">{{ $message }}</div>
                    @enderror
                </div>
        

            <button class="btn btn-primary mt-3" type="submit">
                Create a new post
            </button>
        </form>
     </div>
@endsection