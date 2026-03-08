<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'index project',
            'create project',
            'show project',
            'edit project',
            'delete project',
            'index task',
            'create task',
            'show task',
            'edit task',
            'delete task',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Assign permissions to roles
        $studentRole->syncPermissions(['index project', 'create project', 'show project', 'edit project', 'index task', 'create task', 'show task', 'edit task', 'delete task']);
        $teacherRole->syncPermissions(['index project', 'create project', 'show project', 'edit project', 'delete project', 'index task', 'create task', 'show task', 'edit task', 'delete task']);
        $adminRole->syncPermissions(['index project', 'create project', 'show project', 'edit project', 'delete project', 'index task', 'create task', 'show task', 'edit task', 'delete task']);
    }
}
