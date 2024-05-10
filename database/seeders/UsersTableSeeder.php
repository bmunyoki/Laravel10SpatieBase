<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run() {
        $super = User::role('SPR')->get();
        
        if($super->count() == 0){
            User::insert([
                [
                    'first_name' => 'Benjamin',
                    'last_name' => 'Munyoki',
                    'email' => 'benjamin@test.com',
                    'user_type' => User::ROLE_SPR,
                    'email_verified_at' => Carbon::now()->toDateString(),
                    'password' => Hash::make('Benjamin'),
                    'uuid' => (string) Str::uuid(),
                    'created_at' => Carbon::now()->toDateString(),
                    'updated_at' => Carbon::now()->toDateString()
                ]
            ]);

            // Attach super role
            $user = User::where('email', 'benjamin@test.com')->first();
            $user->assignRole('SPR');
        }

        $admins = User::role('ADM')->get();
        if($admins->count() == 0){
            User::insert([
                [
                    'first_name' => 'App',
                    'last_name' => 'Admin',
                    'email' => 'admin@test.com',
                    'user_type' => User::ROLE_ADM,
                    'email_verified_at' => Carbon::now()->toDateString(),
                    'password' => Hash::make('Admin'),
                    'uuid' => (string) Str::uuid(),
                    'created_at' => Carbon::now()->toDateString(),
                    'updated_at' => Carbon::now()->toDateString()
                ]
            ]);

            // Attach admin role
            $user = User::where('email', 'admin@test.com')->first();
            $user->assignRole('ADM');
        }

        $user = User::role('USR')->get();
        if($user->count() == 0){
            User::insert([
                [
                    'first_name' => 'App',
                    'last_name' => 'User',
                    'email' => 'user@test.com',
                    'user_type' => User::ROLE_USR,
                    'email_verified_at' => Carbon::now()->toDateString(),
                    'password' => Hash::make('User'),
                    'uuid' => (string) Str::uuid(),
                    'created_at' => Carbon::now()->toDateString(),
                    'updated_at' => Carbon::now()->toDateString()
                ]
            ]);

            // Attach user role
            $user = User::where('email', 'user@test.com')->first();
            $user->assignRole('USR');
        }
    }
}
