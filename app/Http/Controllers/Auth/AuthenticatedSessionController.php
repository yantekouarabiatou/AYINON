<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthenticatedSessionController extends Controller
{
    
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user = Auth::user();
        if ($user) {
            $updateResult = $user->update(['last_login_at' => now()]);
            Log::info('Mise à jour de last_login_at pour l\'utilisateur : ' . $user->id, [
                'success' => $updateResult,
                'new_value' => $user->last_login_at,
                'user_data' => $user->toArray()
            ]);
        }


        $request->session()->regenerate();

        return redirect()->intended(route('login', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
