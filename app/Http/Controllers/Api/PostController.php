<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        
        //$posts = Post::all();
        //return response()->json($posts);

        $posts = Post::paginate(3);
        return response()->json($posts);
    }

    //post details 
    public function show($slug) {

        //A.  prendere post da slug 
        $post = Post::where('slug', $slug)->first();

        //B.
        $post = Post::where('slug', $slug)->with(['category','tags'])->first();

        if (! $post) {
            $post['not_found'] = true;
       }elseif ($post->cover) {
            $post->cover = url('storage/'. $post->cover);
        }

        //ritorno dati in json
        return response()->json($post);
    }
}


   
