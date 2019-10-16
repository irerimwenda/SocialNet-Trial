<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Post;

class PostController extends Controller
{
    //store post
    public function store(Request $request) {
        //return $request->all();

        return Post::create([
                'user_id' => Auth::id(),
                'content' => $request->content
            ]);
    }
}
