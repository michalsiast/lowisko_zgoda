<?php

namespace App\Http\Controllers;

use App\Models\TemporaryUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            // Zwraca błędy walidacji jako odpowiedź JSON dla AJAX
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $verificationCode = strtoupper(Str::random(4)) . '-' . strtoupper(Str::random(4));

        // Tworzenie nowego użytkownika z domyślnym statusem nieaktywnym
        TemporaryUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_code' => $verificationCode,
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new \App\Mail\VerificationCodeMail($verificationCode));

        return response()->json(['success' => 'Kod weryfikacyjny został wysłany na adres e-mail.']);
    }



    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function resendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $tempUser = \App\Models\TemporaryUser::where('email', $request->email)->first();

        if (!$tempUser) {
            return response()->json(['error' => 'Nie znaleziono użytkownika.'], 404);
        }

        \Mail::to($tempUser->email)->send(new \App\Mail\VerificationCodeMail($tempUser->verification_code));

        return response()->json(['success' => 'Kod został wysłany ponownie na e-mail.']);
    }


    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string'
        ]);

        $tempUser = TemporaryUser::where('email', $request->email)
            ->where('verification_code', $request->code)
            ->first();

        if (!$tempUser) {
            return response()->json(['error' => 'Nieprawidłowy kod.'], 422);
        }

        User::create([
            'name' => $tempUser->name,
            'email' => $tempUser->email,
            'password' => $tempUser->password,
            'is_active' => false,
            'is_blocked' => false,
        ]);

        $tempUser->delete();

        return response()->json(['success' => 'Konto zostało utworzone. Proszę poczekać na aktywację przez administratora.']);
    }
}
