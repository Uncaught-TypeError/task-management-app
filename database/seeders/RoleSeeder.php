<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'supervisor']);
        Role::create(['name' => 'senior']);
        Role::create(['name' => 'junior']);
        Role::create(['name' => 'guest']);

        // Assign permissions to roles
        $roles = [
            'admin' => ['Create Task', 'Edit Task', 'Delete Task', 'Submit Task', 'Give Feedback', 'Team Up', 'Assign Task'],
            'supervisor' => ['Create Task', 'Edit Task', 'Delete Task', 'Submit Task', 'Give Feedback', 'Team Up', 'Assign Task', 'Take Task'],
            'senior' => ['Create Task', 'Edit Task', 'Delete Task', 'Submit Task', 'Team Up', 'Assign Task', 'Take Task', 'Check Feedback'],
            'junior' => ['Submit Task', 'Give Feedback', 'Team Up', 'Take Task', 'Check Feedback'],
            'guest' => [],
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::findByName($roleName);
            $role->syncPermissions($permissions);
        }
    }
}
