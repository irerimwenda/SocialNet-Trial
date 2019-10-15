<?php

namespace App\Traits;

use App\Friends;
use App\User;

trait Friendable
{
    /* public function hello() {
        return "Hello Friends";
    } */

    public function add_friend($user_requested_id) {
        $friendship = Friends::create([
                'requester' => $this->id,
                'user_requested' => $user_requested_id,
            ]);

            if($friendship) {
                return response()->json($friendship, 200);
            }

            return response()->json('Fail', 501);
    }

    public function accept_friend($requester) {
        $friendship = Friends::where('requester', $requester)
                            ->where('user_requested', $this->id)
                            ->first();

        if($friendship) {
            $friendship->update([
                'status' => 1
            ]);

            //return response()->json('Ok', 200);
            return response()->json($friendship, 200);
        }
        
            return response()->json('Fail', 501);
    }

    public function friends() {

        $friends = array();

        $f1 = Friends::where('status', 1)
                    ->where('requester', $this->id)
                    ->get();
                
        foreach($f1 as $friendship):
            array_push($friends, User::find($friendship->user_requested));
        endforeach;


        $friends2 = array();

        $f2 = Friends::where('status', 1)
                    ->where('user_requested', $this->id)
                    ->get();
        
        foreach($f2 as $friendship):
            array_push($friends2, User::find($friendship->requester));
        endforeach;

        return array_merge($friends, $friends2);
    }
}