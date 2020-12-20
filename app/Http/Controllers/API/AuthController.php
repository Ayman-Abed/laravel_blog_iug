<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
                'name' => 'required',
                'password' => 'required|min:8',
            ]
        );

        $user = User::create(
            [
                'email' => $request->email,
                'name' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );
        $user['access_token'] =  $user->createToken('IUG')->accessToken;


        $success_message = "تم إنشاء حساب مستخدم جديد";

        return $this->sendResponse($user, $success_message);
    }


    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ]
        );

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $user['access_token'] =  $user->createToken('MyApp')->accessToken;
            $success_message = 'You have been succesfully logged in';

            return $this->sendResponse($user, $success_message);
        } else {
            return $this->sendError('Data input not match');
        }
    }


    // Profile
    public function profile(Request $request)
    {

        $user =  Auth::user();

        $user['access_token'] = Str::substr($request->header('Authorization'), 7);

        return $this->sendResponse($user);
    }


    public function logout()
    {
        $token =  Auth::user()->token();
        $token->revoke();
        return $this->sendResponse(null, "You have been succesfully Logged Out");
    }
}
