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
            return redirect('/'); // Przekierowanie na stronę główną po zalogowaniu
        }

        return back()->withErrors([
            'email' => 'Błędne dane logowania.',
        ]);
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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Tworzenie nowego użytkownika
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Automatyczne logowanie po rejestracji
        Auth::guard('web')->login($user);

        return response()->json(['message' => 'Rejestracja zakończona sukcesem!'], 200);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/'); // Przekierowanie na stronę główną po wylogowaniu
    }
}
