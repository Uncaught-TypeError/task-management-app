<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        $user->assignRole('supervisor', 'admin');

        // Give admin-specific permissions
        // $adminPermissions = [
        //     'Create Task',
        //     'Edit Task',
        //     'Delete Task',
        //     'Submit Task',
        //     'Give Feedback',
        //     'Team Up',
        //     'Assign Task',
        // ];

        // Attach admin permissions to the admin role
        // $adminRole = $user->roles->where('name', 'admin')->first();
        // $adminRole->givePermissionTo($adminPermissions);
    }
}
