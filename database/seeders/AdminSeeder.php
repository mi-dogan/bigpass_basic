<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '05050298283',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $user->syncRoles('superadmin');

        $branch =  Branch::query()->create([
            'name' => 'Merkez Şube',
            'primary' => true
        ]);

        Department::query()->create([
            'name' =>  'Merkez Departman',
            'branch_id' => $branch->id,
            'primary' => true
        ]);

        event(new Registered($user));
    }
}
