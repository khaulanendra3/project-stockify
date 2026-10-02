<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Admin Stockify',  'email' => 'admin@stockify.test',   'role' => 'admin'],
            ['name' => 'Manajer Gudang',  'email' => 'manajer@stockify.test', 'role' => 'manajer_gudang'],
            ['name' => 'Staff Gudang',    'email' => 'staff@stockify.test',   'role' => 'staff_gudang'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'is_active' => true,
                    'password' => Hash::make('password'), // ganti setelah login pertama
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
