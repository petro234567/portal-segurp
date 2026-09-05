<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(StorePostRequest $request) 
    { 
        $post = $request->user()->posts()->create( 
            $request->validated() 
        ); 
 
        return redirect()->route('posts.show', $post); 
    } 
}