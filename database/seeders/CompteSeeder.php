<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =  User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password789'),
            'personnel_id' => 1,
        ]);

        $user->assignRole('admin');
    }
}
