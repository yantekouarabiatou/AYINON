<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'telephone' => ['required', 'numeric', 'digits_between:8,15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => 'required|exists:roles,id',
        ]);

         // Stockage de la photo
         $photoPath = $request->file('photo')->storeAs(
            'photos', // Dossier dans storage/app/public/photos/
            time() . '_' . $request->file('photo')->getClientOriginalName(), // Nom unique avec timestamp
            'public' // Sauvegarde dans storage/app/public
        );

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'photo' => 'storage/' . $photoPath, // Stocke le chemin public
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('login', absolute: false));
    }
}
