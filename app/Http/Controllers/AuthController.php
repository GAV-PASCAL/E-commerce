<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role && $user->role->name === 'admin') {
                return redirect()->route('dashbord.vendeur.information');
            }

            return redirect()->route('dashbord.client.information');
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÀ-ÿ\s\-\']+$/'],
            'prenom' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZÀ-ÿ\s\-\']+$/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required', 
                'string', 
                'min:8', 
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/' // Au moins 1 minuscule, 1 majuscule, 1 chiffre
            ],
        ], [
            'nom.regex' => 'Le nom ne peut contenir que des lettres, espaces, tirets et apostrophes.',
            'prenom.regex' => 'Le prénom ne peut contenir que des lettres, espaces, tirets et apostrophes.',
            'password.regex' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre.',
        ]);

        $roleAcheteur = Role::where('name', 'acheteur')->firstOrFail();

        $user = User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // ✅ Hashé avec bcrypt
            'role_id' => $roleAcheteur->id,
        ]);

        // Logging de l'inscription pour la sécurité
        Log::info('Nouvelle inscription', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Auth::login($user);

        return redirect()->route('dashbord.client.information');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
