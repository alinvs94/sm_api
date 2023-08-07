<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json('User not found!', 404);
        }
        $user->makeVisible('password');

        if (!Hash::check($request->password, $user->password)) {
            return response()->json('Something incorrect!', 404);
        }

        $token = $user->createToken('token_auth');

        return response()->json($token, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json('User logout');

    }

    public function update(Request $request)
    {

    }
}