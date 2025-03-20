<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $adminRole = Role::firstOrCreate(['name' => 'Administrateur']);
        $controleurRole = Role::firstOrCreate(['name' => 'Controleur']);
        $gerantRole = Role::firstOrCreate(['name' => 'Gerant']);
        $caissierRole = Role::firstOrCreate(['name' => 'Caissier']);
        
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            // 'photo' => 'profil.jpg',
            'telephone' => '+229 97 12 34 56', 
            'role_id' => $adminRole->id,

        ]);

        User::factory()->create([
            'name' => 'Contrôleur User',
            'email' => 'controleur@example.com',
            // 'photo' => 'profil.jpg',
            'telephone' => '+229 96 12 34 56', 
            'role_id' => $controleurRole->id,
        ]);

        User::factory()->create([
            'name' => 'Gérant User',
            'email' => 'gerant@example.com',
            // 'photo' => 'profil.jpg',
            'telephone' => '+229 94 12 34 56', 
            'role_id' => $gerantRole->id,
        ]);

        User::factory()->create([
            'name' => 'Caissier User',
            'email' => 'caissier@example.com',
            // 'photo' => 'profil.jpg',
            'telephone' => '+229 99 12 34 56', 
            'role_id' => $caissierRole->id,
        ]);

        // User::factory(5)->create([
        //     'role_id' => $caissierRole->id,
        // ]);

        // User::factory(5)->create([
        //     'role_id' => $gerantRole->id,
        // ]);
    }
}
