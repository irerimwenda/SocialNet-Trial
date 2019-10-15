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
            return ["status" => "friends"];
        }

        if(Auth::user()->has_pending_friend_request_from($id))
        {
            return ["satus" => "pending"];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
            return ["satus" => "waiting"];
        }

        return ["status" => 0];
        
    }
}
