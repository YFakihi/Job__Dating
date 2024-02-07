<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $superadminRole = Role::create(['name' => 'superadmin']);
        $learnerRole = Role::create(['name' => 'learner']);

       
        Permission::create(['name' => 'crete_role']);

        

        $adminRole->givePermissionTo(['crete_role',]);
        

        // Create a test user
        // $user = User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        
        // $user->assignRole('learner');
    }
}
