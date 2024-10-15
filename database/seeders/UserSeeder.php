<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users =  \App\Models\User::factory(100)->create();
        foreach($users as $user)
        {
            $user->syncRoles('admin');
        }
    }
}
