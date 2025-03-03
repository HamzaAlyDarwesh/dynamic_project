<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@astudio.com',
            'password' => Hash::make('gt^uoE4$'),
        ]);
    }
}
