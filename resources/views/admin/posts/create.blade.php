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

        <form action=" {{ route('admin.posts.store')}} " method="POST" enctype="multipart/form-data">
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
                    <label for="category_id" class="mt-3" >Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Uncategorized</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if($category->id == old('category_id'))selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-info">{{ $message }}</div>
                    @enderror
                </div>

                {{--TAGS--}}
                <div class="mb-4 mt-3">
                    <h6>Tags</h6>

                    @foreach ( $tags as $tag ) 
                       <span>
                           <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}"
                                @if (in_array($tag->id, old('tags',[]))) checked @endif>
                                
                           <label for="tag" {{ $loop->iteration }}>
                              {{ $tag->name }}
                           </label>
                       </span>
                    @endforeach
                    @error('tags')
                       <div class="text-info">{{ $message }}</div>
                    @enderror
                </div>

                {{--POST COVER IMAGE--}}
                <div class="mb-4">
                    <label class="form-label" for="cover">Add Image</label>
                    <input type="file" class="form-control-file" name="cover" id="cover">
                    @error('cover')
                       <div class="text-info">{{ $message }}</div>
                    @enderror
                </div>
        

            <button class="btn btn-primary mt-3" type="submit">
                Create a new post
            </button>
        </form>
     </div>
@endsection