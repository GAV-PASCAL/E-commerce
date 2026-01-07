<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Urlimg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer une URL par défaut
        Urlimg::firstOrCreate(
            ['id' => 1],
            ['url' => 'https://via.placeholder.com/300']
        );

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $acheteurRole = Role::firstOrCreate(['name' => 'acheteur']);

        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'nom' => 'Admin',
                'prenom' => 'Principal',
                'role_id' => $adminRole->id,
                'password' => 'admin1234',
            ]
        );

        User::firstOrCreate(
            ['email' => 'client@gmail.com'],
            [
                'nom' => 'Client',
                'prenom' => 'Demo',
                'role_id' => $acheteurRole->id,
                'password' => 'client1234',
            ]
        );
    }
}
