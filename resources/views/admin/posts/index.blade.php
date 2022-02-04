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
         <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }} ">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id)}}">Edit</a>
                    </td>
                    <td>
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