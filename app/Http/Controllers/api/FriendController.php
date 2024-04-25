<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function addFriend(Request $request)
    {
        $checkFriend = Friend::where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->first();
        if (!$checkFriend) {
            $addFriend = Friend::create($request->all());
            return response()->json($addFriend, 201);
        }

        return response()->json("Already friends", 404);
    }

    public function removeFriend(Request $request)
    {
        $friend = Friend::where('user_id', $request->user_id)->where('friend_id', $request->friend_id)->first();
        if ($friend) {
            $friend->delete();
            return response()->json("Friend deleted", 200);
        }

        return response()->json("User not found.", 404);
    }
}