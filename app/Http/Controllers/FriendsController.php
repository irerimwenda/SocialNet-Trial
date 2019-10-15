<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewFriendRequest;
use App\Notifications\FriendRequestAccepted;
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
            return ["status" => "pending"];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
            return ["status" => "waiting"];
        }

        return ["status" => 0];
        
    }

    //Add Friend
    public function addFriend($id) {
        //Send e-mails, notifications, broadasting...
        $response = Auth::user()->add_friend($id);

        User::find($id)->notify(new NewFriendRequest(Auth::user()));

        return $response;
    }

    //Accept Friend
    public function acceptFriend($id) {
        //send emails, notification, broadcasting...
        $response = Auth::user()->accept_friend($id);

        User::find($id)->notify(new FriendRequestAccepted(Auth::user()));

        return $response;
    }
}
