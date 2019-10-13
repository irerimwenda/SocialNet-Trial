<?php

namespace App\Traits;

use App\Friends;

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

            return response()->json('Ok', 200);
        }
        
            return response()->json('Fail', 501);
    }
}