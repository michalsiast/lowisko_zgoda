<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user_login'); // Stwórz widok logowania dla użytkowników
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::user();

            if (!$user->is_active) {
                Auth::logout();
                return response()->json([
                    'errors' => ['login' => ['Konto nie jest jeszcze aktywne.']]
                ], 422);
            }

            if ($user->is_blocked) {
                Auth::logout();
                return response()->json([
                    'errors' => ['login' => ['Konto zostało zablokowane.']]
                ], 422);
            }

            return response()->json(['success' => true]);
        }

        return response()->json([
            'errors' => ['login' => ['Nieprawidłowy email lub hasło.']]
        ], 422);
    }

    public function showRegistrationForm()
    {
        return view('auth.user_register'); // Stwórz widok rejestracji dla użytkowników
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tworzenie nowego użytkownika z domyślnym statusem nieaktywnym
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => false,
            'is_blocked' => false,
        ]);

        return redirect()->route('login')->with('status', 'Konto zostało utworzone. Proszę poczekać na aktywację przez administratora.');
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/'); // Przekierowanie na stronę główną po wylogowaniu
    }
}
