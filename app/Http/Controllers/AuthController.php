<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    public function apiLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->first();
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user,
                'token' => $user->createToken('API Token')->plainTextToken
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email or password is incorrect'
        ], 401);
    }

    public function apiRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful',
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function apiLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successful'
        ]);
    }
}
