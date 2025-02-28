<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            // Vérifier si l'utilisateur est actif
            if (Auth::user()->is_active !== 1) {
                // Déconnecter l'utilisateur
                Auth::logout();
                
                // Invalider la session
                $request->session()->invalidate();
                
                // Régénérer le jeton CSRF
                $request->session()->regenerateToken();
                
                // Rediriger avec un message d'erreur
                // return redirect()->route('login')
                //     ->withErrors(['email' => 'Ce compte est désactivé. Veuillez contacter l\'administrateur.'])
                //     ->with('error', 'Accès refusé: Compte désactivé');
                return abort(403, 'Compte désactivé. Veuillez contacter l\'administrateur.');
            }
        }

        return $next($request);
    }
}
