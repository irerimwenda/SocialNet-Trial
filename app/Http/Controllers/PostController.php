<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //store post
    public function store(Request $request) {
        return $request->all();
    }
}
