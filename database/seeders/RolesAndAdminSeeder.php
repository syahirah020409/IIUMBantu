<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RolesAndAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRoleId = DB::table('roles')->insertGetId([
            'name' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $userRoleId = DB::table('roles')->insertGetId([
            'name' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'phone_number' => '0191234567',
            'password' => Hash::make('123456'),
        ]);

        // Create admin user
        $admin1 = User::create([
            'name' => 'Administrator',
            'email' => 'n.syahirah@live.iium.edu.my',
            'phone_number' => '0191234567',
            'password' => Hash::make('123456'),
        ]);

        // Create admin user
        $admin2 = User::create([
            'name' => 'Administrator',
            'email' => 'nurain.farid@live.iium.edu.my',
            'phone_number' => '0191234567',
            'password' => Hash::make('123456'),
        ]);

        // Assign admin role to the admin user
        $admin->roles()->attach($adminRoleId, ['created_at' => now(), 'updated_at' => now()]);
        $admin1->roles()->attach($adminRoleId, ['created_at' => now(), 'updated_at' => now()]);
        $admin2->roles()->attach($adminRoleId, ['created_at' => now(), 'updated_at' => now()]);
    }
}
