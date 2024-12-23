<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('auth.sign'); // Utilisez la vue 'sign' au lieu de 'login'
    }

    /**
     * Gère la connexion de l'utilisateur.
     */
    public function login(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion
        if (Auth::attempt($request->only('email', 'password'))) {
            // Connexion réussie, redirection vers la page menu
            return redirect()->route('menu');
        }

        // Connexion échouée, retour avec erreur
        return redirect()->back()->withErrors(['email' => 'Identifiants invalides']);
    }
}
