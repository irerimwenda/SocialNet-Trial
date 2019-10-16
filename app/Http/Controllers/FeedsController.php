<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Post;

class FeedsController extends Controller
{
    //live feeds
    public function feed() {
        $friends = Auth::user()->friends();
        $posts = Post::where('user_id', Auth::id())->get();

        $feed = array();
        $myposts = array();

        foreach($friends as $friend):

            foreach($friend->posts as $post):
                array_push($feed, $post);
            endforeach;

        endforeach;

        foreach($posts as $post):
            array_push($myposts, $post);
        endforeach;

        //return $feed;
        return array_merge($feed, $myposts);
    }
}
