<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bismark.com'],
            [
                'name' => 'Bismark Admin',
                'password' => Hash::make('Admin@123456'),
                'role' => 'admin'
            ]
        );
    }
}
