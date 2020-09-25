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

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();

        // cek user
        if(!$user){
            return response()->json(['message' => 'Login failed'], 401);
        }
        // cek password
        $isValidPassword = Hash::check($password, $user->password);
        if(!$isValidPassword){
            return response()->json(['message' => 'Login failed'], 401);
        }
        // generateToken
        $generateToken = bin2hex(random_bytes(40));
        $user->update([
            'token' => $generateToken
        ]);

        return response()->json($user);
    }
}
