<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $result = [];
        $result['code'] = 400;
        $result['status'] = 'error';
        $result['data'] = [];


        $email = $request->email;
        $user = User::where('email', $email)->first();
        if(!$user) {
            $result['code'] = 401;
            $result['data'] = [
                'message' => 'Email not found'
            ];

            return $result;
        }

        $password = $request->password;
        if(!Hash::check($password, $user->password)) {
            $result['code'] = 401;
            $result['data'] = [
                'message' => 'Email and password not match'
            ];

            return $result;
        }

        $token = Str::random(60);

        //update user login
        $data = [];
        $data['token'] = $token;
        $data['token_expired'] = Carbon::now()->addMinutes(30);
        User::where('email', $email)->update($data);

        $result['code'] = 200;
        $result['status'] = 'success';
        $result['data'] = $data;
        return $result;
    }

    public function register()
    {

    }
}
