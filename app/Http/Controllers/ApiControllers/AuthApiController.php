<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthApiController extends Controller
{
    public function allUser()
    {
        return response([
            "message" => "Succès.",
            "data" => User::all(),
            "status" => 200,
            "error" => []
        ]);
    }



    public function login(Request $request)
    {

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:4',
        ]);



        // Getting user who want to login
        $user = User::where('email', $fields['email'])->first();

        // dd($user);
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'Bad creds, email or password is not correct'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'message' => 'You have successfully logged in',
            'data' => [
                'type' => 'bearer',
                'token' => $token,
            ],
            'status' => 200,
            'error' => []
        ];

        return response($response);
    }


    public function register(Request $rq){
        $rq->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string',
        ]);

        $user = new User;
        $user->name = $rq->name;
        $user->email = $rq->email;
        $user->password = Hash::make($rq->password);
        $user->isprofilcompleted = false;
        $user->save();

        return response([
            "message"=>"Your account has been created",
            "status" => 200,
            "error"=>"{}"
        ]);
    }
}
