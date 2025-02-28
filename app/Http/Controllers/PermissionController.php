<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::with('roles')->get();
        //  dd($permissions->toArray());
        return view('permissions.index', compact('permissions'));
    }


    /**
     * Afficher le formulaire de création (si utilisation de Blade).
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Enregistrer une nouvelle permission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions|string|max:255',
            'description' => 'nullable|string'
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Permission créée avec succès', 'data' => $permission]);
    }

    /**
     * Afficher une permission spécifique.
     */
    public function show(Permission $permission)
    {
        return response()->json($permission);
    }

    /**
     * Afficher le formulaire d'édition (si utilisation de Blade).
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Mettre à jour une permission existante.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'description' => 'nullable|string'
        ]);

        $permission->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Permission mise à jour avec succès', 'data' => $permission]);
    }

    /**
     * Supprimer une permission.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json(['message' => 'Permission supprimée avec succès']);
    }
}
