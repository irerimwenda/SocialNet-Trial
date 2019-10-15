<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

class FriendsController extends Controller
{
    //Check friend status
    public function check($id)
    {
        if(Auth::user()->is_friends_with($id) === 1) {
            return ["status" => "Friends"];
        }

        if(Auth::user()->has_pending_friend_request_from($id))
        {
            return ["satus" => "Pending"];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
            return ["satus" => "Waiting"];
        }

        return ["status" => 0];
        
    }
}
