<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Tambahkan import Role

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Bersihkan cache Spatie Permission agar tidak terjadi bentrok data lama
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Tentukan ID Tim default (misal Tim ID 1)
        $teamId = 1;
        setPermissionsTeamId($teamId); 

        // 3. Pastikan Role sudah benar-benar ada untuk Tim 1 ini di database
        // firstOrCreate akan membuat role baru JIKA belum ada, jadi mencegah duplikasi
        Role::firstOrCreate(['name' => 'user', 'team_id' => $teamId]);
        Role::firstOrCreate(['name' => 'admin', 'team_id' => $teamId]);

        // 4. Buat 10 user biasa dan berikan role 'user' pada Tim 1
        User::factory(10)->create()->each(function ($user) {
            // Catatan: Tidak perlu 'use ($teamId)' karena setPermissionsTeamId() 
            // di atas sudah berlaku global selama proses seeder ini berjalan.
            $user->assignRole('user');
        });

        // 5. Buat admin khusus pada Tim 1
        $admin = User::factory()->create([
            'name' => 'Admin IoT',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
    }
}