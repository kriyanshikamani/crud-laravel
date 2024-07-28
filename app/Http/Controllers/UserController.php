<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
       $data=$request->validate([
        'name' => 'required|unique|max_length(255)',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
       ]);
       $user=User::create($data);

       if ($user){
        return response()->json(['message'=>'User registered successfully'],201);
       }
    }
}
