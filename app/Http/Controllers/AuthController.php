<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function create()
    {
        return view('auth.create');
    }

    // Traite la connexion
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|min:6|max:20'
    ]);
    $credentials = $request->only('email', 'password');

    if (!Auth::validate($credentials)) {
        return redirect(route('login'))
            ->withErrors(trans('auth.failed'))
            ->withInput();
    }

    $user = Auth::getProvider()->retrieveByCredentials($credentials);
    Auth::login($user);

    // Redirection vers la page principale des étudiants (students)
    return redirect()->intended(route('students.index'))->with('success', 'Vous êtes connecté !');
}

    // Déconnexion
    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
