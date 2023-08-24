<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function friendsList($userId)
    {
        $friends = Friend::where('user_id', $userId)->get();

        return response()->json($friends, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addFriend(Request $request)
    {
        $friend = Friend::create($request->all());

        return response()->json($friend, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}