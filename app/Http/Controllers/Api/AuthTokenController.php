<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Response;

class AuthTokenController extends Controller
{

    public function index(Request $request)
    {
        return $request->user()->tokens;
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'device_name' => ['required'],
            // fcm token consider the token depend on it the firebase mean depend it in notification system
            'fcm_token' => ['nullable']
            // here permission will api give me and when create for token I created it with this authorizations
            // 'permission' => ['array']
        ]);

        // Auth::validate($request->only('email', 'password'));
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // ['*'] here represent the Token Authorization and not for user
            // ['*'] it's represent the Token toke all authorizations
            $token = $user->createToken($request->device_name, ['projects.create', 'projects.update'], $request->fcm_token);

            return response()->json([
                'token' => $token->plainTextToken,
                'user' => $user,
            ], 201);
        }

        // here 401 status mean unAuthentication or unAuthorization

        return Response::json([
            'message' => 'Invalid Credentials',
        ], 401);
    }

    public function destroy($id)
    {
        $user = Auth::guard('sanctum')->user();

        // here Logout from current device mean delete the current access token of user.
        // return $user->currentAccessToken()->delete;

        // Logout from single device
        $user->tokens()->findOrFail($id)->delete();

        // Logout from all devices
        // $user->tokens()->delete();

        return [
            'message' => 'Token deleted!',
        ];
    }
}
