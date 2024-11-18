<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $request->user()->createToken('Api Token');

            return response()->json([
                'user' => $user,
                'token' => $token->plainTextToken,
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        // Revoke all user tokens (or just revoke the current token)
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }

}
