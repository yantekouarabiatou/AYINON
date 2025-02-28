<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use ZipArchive;
use Maatwebsite\Excel\Facades\Excel;  // Assurez-vous que cette ligne est présente

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    
    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        $users = User::where('is_active', 1)
                ->orderBy('created_at', 'desc')
                ->get();
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
            $user->photo = 'storage/' . $photoPath;
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
        \Log::info('Début de la mise à jour pour l\'utilisateur ID: ' . $id);
        \Log::info('Données reçues: ', $request->all());
    
    try {
        
        // Trouver l'utilisateur
        $user = User::findOrFail($id);

        // Validation avec moins de contraintes
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role_id' => 'sometimes|integer|exists:roles,id', 
            'telephone' => 'sometimes|string|nullable',
        ]);

        // Mise à jour conditionnelle des champs
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        // Mise à jour du mot de passe si fourni
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        // Mise à jour du rôle si fourni
        if ($request->has('role_id')) {
            $user->role_id = $request->input('role_id');
        }

        // Mise à jour du téléphone si fourni
        if ($request->has('telephone')) {
            $user->telephone = $request->input('telephone');
        }

        // Gestion de l'upload de l'image
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }
        
            // Générer un nom unique pour l'image avec un timestamp et son nom original
            $photoPath = $request->file('photo')->storeAs(
                'photos', // Dossier dans storage/app/public/photos/
                time() . '_' . $request->file('photo')->getClientOriginalName(), // Nom unique avec timestamp
                'public' // Sauvegarde dans storage/app/public
            );
        
            // Enregistrer le chemin relatif dans la base de données
            $user->photo = 'storage/' . $photoPath;
        }

        $user->save();

        return Redirect::route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    } catch (\Exception $e) {
        \Log::error('Erreur lors de la mise à jour: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());
        
        return Redirect::back()->withErrors(['error' => 'Erreur lors de la mise à jour: ' . $e->getMessage()]);
    }
    }

    /**
     * Supprime un utilisateur.
     */
    public function destroy(string $id)
    {
        // Trouver l'utilisateur avant de l'utiliser
        $user = User::findOrFail($id);
        // $user->delete();
        // Log::info('Tentative de suppression (désactivation) de l\'utilisateur', [
        //     'user_id' => $user->id,
        //     'user_name' => $user->name,
        //     'email' => $user->email
        // ]);
        $user->update(['is_active' => 0]);

        // Log::info('Utilisateur désactivé avec succès', [
        //     'user_id' => $user->id,
        //     'user_name' => $user->name
        // ]);

        return Redirect::route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function reactivate(string $id)
    {
        // Trouver l'utilisateur avant de l'utiliser
        $user = User::findOrFail($id);
        
        // Mettre à jour is_active à true pour réactiver l'utilisateur
        $user->update(['is_active' => 1]);

        return Redirect::route('users.index')->with('success', 'Utilisateur réactivé avec succès.');
    }




    public function exportUsers(Request $request)
    {
        $format = $request->format;
        $role = $request->role;
    
        // Filtrer par rôle si spécifié
        $query = User::query();
        if ($role) {
            // $query->whereHas('roles', function($q) use ($role) {
            //     $q->where('name', $role);
            // });
            $query->whereHas('role', function ($q) use ($role) {
                $q->where('name', $role);
            });
            
        }
    
        $users = $query->get();
        $zipPath = storage_path('app/public/users.zip'); // Chemin où le fichier ZIP sera généré
    
        switch ($format) {
            case 'excel':
                return Excel::download(new UsersExport($users), 'users.xlsx');
            case 'pdf':
                $pdf = PDF::loadView('exports.users-pdf', ['users' => $users]);
                return $pdf->download('users.pdf');
            case 'csv':
                return Excel::download(new UsersExport($users), 'users.csv', \Maatwebsite\Excel\Excel::CSV);
            case 'zip':
                // Logique pour créer le fichier ZIP
                $zip = new ZipArchive;
                if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
                    // Ajouter les fichiers dans le ZIP
                    foreach ($users as $user) {
                        $userData = "User ID: {$user->id}, Name: {$user->name}\n";
                        // Ajouter un fichier pour chaque utilisateur
                        $zip->addFromString("user_{$user->id}.txt", $userData);
                    }
    
                    $zip->close();
                    return response()->download($zipPath)->deleteFileAfterSend(true);
                } else {
                    return back()->with('error', 'Erreur lors de la création du fichier ZIP');
                }
            default:
                return back()->with('error', 'Format non pris en charge');
        }
    }
    

}
