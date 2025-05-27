<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Buat role super admin jika belum ada
        $role = Role::firstOrCreate(['name' => 'super admin']);

        // Buat user jika belum ada
        $user = User::firstOrCreate(
            ['username' => 'admin'],
            ['password' => Hash::make('password123')]
        );

        // Attach role jika belum ter-attach
        if (!$user->roles()->where('role_id', $role->id)->exists()) {
            $user->roles()->attach($role->id);
        }
    }
}
