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

      

@endsection