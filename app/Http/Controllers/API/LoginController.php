<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user != null) {
            Auth::loginUsingId($user->id);
            $token = auth()->user()->createToken('ReminterBIT')->accessToken;
            return response()->json(
                [
                    'error' => 'false', 
                    'message' => 'Welcome', 
                    'data' => auth()->user(),
                    'token' => $token
                ], 200);
        } else {
            return response()->json(
                [
                    'error' => 'UnAuthorised',
                    'message' => 'E-mail not found, please contact Senior'
                ], 401);
        }
    }
}
