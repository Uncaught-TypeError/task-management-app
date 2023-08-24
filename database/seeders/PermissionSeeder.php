<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Create Task']);
        Permission::create(['name' => 'Edit Task']);
        Permission::create(['name' => 'Submit Task']);
        Permission::create(['name' => 'Delete Task']);
        Permission::create(['name' => 'Give Feedback']);
        Permission::create(['name' => 'Team Up']);
        Permission::create(['name' => 'Assign Task']);
        Permission::create(['name' => 'Take Task']);
        Permission::create(['name' => 'Check Feedback']);
    }
}
