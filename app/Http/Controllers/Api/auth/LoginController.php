<?php

namespace App\Http\Controllers\Api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    //


    function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ], 200);
    }

    function logout()
    {

        auth()->user()->currentAccessToken()->delete();



        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }


    function refresh()
    {
        $token = auth()->user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ], 200);
    }


    public function forgotPassword(Request $request)
    {
        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Password reset link sent to your email'], 200)
            : response()->json(['error' => 'Unable to send reset link'], 422);
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password reset successful'], 200)
            : response()->json(['error' => 'Unable to reset password'], 422);
    }
}
