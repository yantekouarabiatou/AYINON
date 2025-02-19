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
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $controleurRole = Role::firstOrCreate(['name' => 'controlleur']);
        $gerantRole = Role::firstOrCreate(['name' => 'gerant']);
        $caissierRole = Role::firstOrCreate(['name' => 'caissier']);
        
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => $adminRole->id,

        ]);

        User::factory()->create([
            'name' => 'Contrôleur User',
            'email' => 'controleur@example.com',
            'role_id' => $controleurRole->id,
        ]);

        User::factory()->create([
            'name' => 'Gérant User',
            'email' => 'gerant@example.com',
            'role_id' => $gerantRole->id,
        ]);

        User::factory()->create([
            'name' => 'Caissier User',
            'email' => 'caissier@example.com',
            'role_id' => $caissierRole->id,
        ]);

        User::factory(5)->create([
            'role_id' => $caissierRole->id,
        ]);

        User::factory(5)->create([
            'role_id' => $gerantRole->id,
        ]);
    }
}
