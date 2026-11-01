<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // STEP 1: CLEAR PERMISSION CACHE

        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();


        // STEP 2: CREATE PERMISSIONS

        $permissions = [

            // Administrator permissions
            'manage students',
            'manage courses',
            'manage registrations',
            'manage users',

            // Lecturer permissions
            'view assigned courses',
            'view registered students',

            // Student permissions
            'view available courses',
            'view own registrations',

        ];


        // Store all created permissions

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }


        // STEP 3: CREATE ROLES

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $lecturer = Role::firstOrCreate([
            'name' => 'lecturer',
            'guard_name' => 'web',
        ]);

        $student = Role::firstOrCreate([
            'name' => 'student',
            'guard_name' => 'web',
        ]);


        // STEP 4: ASSIGN ALL PERMISSIONS TO ADMIN

        $admin->syncPermissions($permissions);


        // STEP 5: ASSIGN PERMISSIONS TO LECTURER

        $lecturer->syncPermissions([

            'view assigned courses',
            'view registered students',

        ]);


        // STEP 6: ASSIGN PERMISSIONS TO STUDENT

        $student->syncPermissions([

            'view available courses',
            'view own registrations',

        ]);


        // STEP 7: CLEAR PERMISSION CACHE AGAIN

        app()[PermissionRegistrar::class]
            ->forgetCachedPermissions();


        // SUCCESS MESSAGE

        $this->command->info(
            'Roles and permissions created and assigned successfully!'
        );

    }
}