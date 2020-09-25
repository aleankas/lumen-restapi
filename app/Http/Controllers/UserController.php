<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:users|email',
            'password' => 'required|min:3'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $hashPassword = Hash::make($password);

        $user = User::create([
            'email' => $email,
            'password' => $hashPassword
        ]);
        return response()->json(['message' => 'Success'], 201);
    }
}
