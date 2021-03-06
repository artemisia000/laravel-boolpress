@extends('layouts.app')

@section('content')
     <div class="container">
         <div class="mt-5" >
            <h1>{{  $post->title }} </h1>
         </div>
         <div class="mt-2">
             <strong>Category:
              {{ $post->category->name }}
             </strong>   
         </div>
        
         <div class="mt-5">
             <a class="btn btn-success" href="{{ route('admin.posts.edit', $post->id) }} ">Edit</a>
             <a class="btn btn-primary" href="{{ route('admin.posts.index')}} ">Back to archive</a>
         </div>
         <div class="row">
             <div class="col-6">
                <p>{{ $post->description }}</p>
             </div> 
             
             @if ($post->cover)
                <div class="col-6">
                    <img class="img-fluid" src="{{ asset('storage/' . $post->cover )}} " alt="{{ $post->title }} ">
                </div>  
            @endif    
         </div>

         @if($post->tags->isEmpty())
             <h4>Tags</h4>

             @foreach($post->tags as $tag)
                  <span class="badge badge-primary"> {{ $tag->name }} </span>
             @endforeach

         @else
             <p>No Tags</p>
         @endif
     </div>

@endsection