<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Affiche le formulaire de création d'un utilisateur.
     */
    public function create()
    {
        $roles = Role::all(); 
        return view('users.create', compact('roles'));
    }

    /**
     * Stocke un nouvel utilisateur en base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->telephone = $request->input('telephone');
        $user->role_id = $request->input('role_id');

        // Gestion de l'upload de l'image
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->storeAs(
                'photos', // Dossier dans storage/app/public/photos/
                time() . '_' . $request->file('photo')->getClientOriginalName(), // Nom unique avec timestamp
                'public' // Sauvegarde dans storage/app/public
            );
            $user->photo = $photoPath;
        }

        $user->save();

        return Redirect::route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }


    /**
     * Affiche les détails d'un utilisateur.
     */
    public function show(string $id)
    {
        $roles = Role::all();
        $selectedUser = User::findOrFail($id);
        // dd($selectedUser);
        return view('users.show', compact('selectedUser', 'roles'));
    }

    /**
     * Affiche le formulaire de modification d'un utilisateur.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Met à jour les informations d'un utilisateur.
     */
    public function update(Request $request, string $id)
    {
        // Trouver l'utilisateur avant d'utiliser `$user->id`
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return Redirect::route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur.
     */
    public function destroy(string $id)
    {
        // Trouver l'utilisateur avant de l'utiliser
        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
