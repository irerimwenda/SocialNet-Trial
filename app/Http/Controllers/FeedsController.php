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

        $feed = array();

        foreach($friends as $friend):

            foreach($friend->posts as $post):
                array_push($feed, $post);
            endforeach;

        endforeach;

        return $feed;
    }
}
