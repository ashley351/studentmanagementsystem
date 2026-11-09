<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        // ADMIN ACCOUNT

        $admin = User::firstOrCreate(
            [
                'email' => 'admin@mubs.ac.ug'
            ],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('Admin#2026'),
            ]
        );

        $admin->syncRoles(['admin']);


        // LECTURER ACCOUNT

        $lecturer = User::firstOrCreate(
            [
                'email' => 'lecturer@mubs.ac.ug'
            ],
            [
                'name' => ' Mr. Moshin Lecturer',
                'password' => Hash::make('Mubs#2026'),
            ]
        );

        $lecturer->syncRoles(['lecturer']);

    }
}