@extends('layouts.app')

@section('content')
     <div class="container">
        <h1>Blog Posts Index</h1>
          @if (session('deleted'))
            <div class="alert alert-success">
                {{ session('deleted') }}
            </div>
          @endif

         @if ($posts->isEmpty())
         <p>No found. <a href=" {{ route('admin.posts.create') }} "> Create a new post</a></p>
         @else
         <table class="table" >
            <thead>
                <tr>
                    <th class="col-1 ms-4">ID</th>
                    <th class="col-2 ms-4">Title</th>
                    <th colspan="3" class="col-9">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td class="col-1 ms-4">{{ $post->id }}</td>
                    <td class="col-2 ms-4">{{ $post->title }}</td>
                    <td class="col-3">
                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }} ">Show</a>
                    </td>
                    <td class="col-3">
                        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id)}}">Edit</a>
                    </td>
                    <td class="col-3">
                        <form action=" {{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">                        
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      @endif        
     </div>
@endsection