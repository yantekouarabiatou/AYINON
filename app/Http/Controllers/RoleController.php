<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Role::all();
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); 
    
    // \Log::info('Les roles:', ['role' => $roles]);
    // return view('auth.register', compact('roles'));
    return view('users.index', compact('roles'));
    dd($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Rôle ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $role = Role::findOrFail($id);
       
        $selectedUsers = $role->users()->get();


        $totalUsers = $selectedUsers->count();
        return view('roles.show', compact('role', 'selectedUsers', 'totalUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'description' => 'nullable|string',
        ]);

        $role->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rôle supprimé avec succès.');
    }
    
        public function getRoles()
    {
        $roles = Role::all(); 
        
        // Journalisation pour le débogage
        \Log::info('Les rôles récupérés:', ['roles' => $roles]);

        // Retourne la vue `users.index` avec les rôles
        return view('users.index', compact('roles'));
    }
}
