<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        $userRole = \Spatie\Permission\Models\Role::create(['name' => 'user']);

        // Create admin user
        $admin = \App\Models\User::create([
            'name' => 'Admin Royale',
            'email' => 'admin@hotel.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
        $admin->assignRole($adminRole);

        // Assign 'user' role to all other users
        \App\Models\User::where('id', '!=', $admin->id)->get()->each(function ($user) use ($userRole) {
            $user->assignRole($userRole);
        });
    }
}
