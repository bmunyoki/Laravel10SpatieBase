<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        if(Role::get()->count() == 0){
            app()['cache']->forget('spatie.permission.cache');

            Role::create(['name' => 'SPR']);
            Role::create(['name' => 'ADM']);
            Role::create(['name' => 'USR']);
        }
    }
}
