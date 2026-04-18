<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    // 2. Set ID tim yang aktif (Misalnya ID tim adalah 1)
        setPermissionsTeamId(1); 
        // Pastikan role sudah ada (via RolePermissionSeeder)
        // Roles: admin, user

        // Buat 10 user biasa + user
        User::factory(10)->create()->each(function ($user) {
            // Assign role farmer
            $user->assignRole('user');
        });

        // Buat admin user khusus
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

         

        $admin->assignRole('admin');
    }
}