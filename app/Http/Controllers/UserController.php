<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\User;
use \Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['register', 'login']]);
    }

    public function register(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            $response = User::create([
                'id' => $request->id,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
    
            if ($response) {
                return response()->json([
                    'success' => true,
                    'message' => 'Register Success'                
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Register Failed'
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User has been registered.'
            ], 302);
        }
        
    }

    public function login(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // put this token on Authorization header
                $apiToken = base64_encode($user);
                return response()->json([
                    'success' => true,
                    'message' => 'Login Success',
                    'data' => $apiToken
                ], 200); 
                // cara untuk decode, cocokkan id dan password
                // dd(json_decode(base64_decode($apiToken)));
                
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Wrong ID/Password',                    
                ], 401);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
        }
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User Found!',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'                
            ], 404);
        }
    }

    public function delete($id)
    {
        // TODO : Implement later hahahaa
    }
}
