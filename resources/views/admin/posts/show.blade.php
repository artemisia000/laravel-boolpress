@extends('layouts.app')

@section('content')
     <div class="container">
         <div class="m-5" >
            <h1>{{  $post->title }} </h1>
         </div>
        
         <div class="m-5">
             <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }} ">Edit</a>
             <a class="btn btn-primary" href="{{ route('admin.posts.index')}} ">Back to archive</a>
         </div>
         <div class="row">
             <div class="col-6">
                <p>{{ $post->description }}</p>
             </div>   
         </div>
     </div>

@endsection