<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    public function index() {
        return view('master');
    }

    public function login(Request $request)
    {  
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $status = 200;
            $response = [
                'status'  => true,
                'user'    => Auth::user(),
                'token'   => Auth::user()->createToken('userToken')->accessToken,
                'message' => 'Login success'
            ];
        } else {
            $status = 401;
            $response = ['error' => 'The email or password is incorrect.'];
        }

        return response()->json($response, $status);
    }

    public function register(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'email'       => 'required|unique:users|email',
            'password'    => 'required|min:8',
            'phoneNumber' => 'required|min:12'
        ]);

        if ($validators->fails()) {
            return response()->json([
                'status'  => false,
                'data'    => [],
                'message' => $validators->errors()->all()
            ], 400);
        } 

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        
        $user = User::create($input);
 
        $response = [
            'status'  => true,
            'user'    => $user,
            'token'   => $user->createToken('userToken')->accessToken,
            'message' => 'Register success'
        ];
        
        return response()->json($response, 200);
    } 

    public function show(User $user)
    {
        return response()->json($user,200);
    }
}
