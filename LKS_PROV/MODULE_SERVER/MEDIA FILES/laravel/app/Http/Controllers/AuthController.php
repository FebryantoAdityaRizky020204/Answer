<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getUsersList(){
        $users = User::get();
        return response()->json(['users' => $users], 200);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:8',
            'password' => 'required|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'api_token' => 1
        ]);

        $user->update(['api_token' => bcrypt($user->id)]);

        return response()->json([
            'status' => true,
            'message' => 'Register Succesfuly',
            'token' => $user->api_token
        ], 201);
    }


    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }


        if(Auth::attempt($request->all())){
            $token = Auth::user()->api_token;
            return response()->json([
                'status' => true,
                'message' => 'User Loged In Succesfuly',
                'token' => $token
            ],200);
        }

        return response()->json([
            'status' => false,
            'message' => 'invalid login'
        ],401);
    }
}
