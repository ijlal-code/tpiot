<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tentukan ID Tim default (misal Tim ID 1)
        $teamId = 1;
        setPermissionsTeamId($teamId); 

        // 2. Buat 10 user biasa dan berikan role 'user' pada Tim 1
        User::factory(10)->create()->each(function ($user) use ($teamId) {
            $user->assignRole('user');
        });

        // 3. Buat admin khusus pada Tim 1
        $admin = User::factory()->create([
            'name' => 'Admin IoT',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}