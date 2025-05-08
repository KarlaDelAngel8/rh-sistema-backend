<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'name'             => 'Diego Israel',
            'last_name'        => 'Han',
            'second_last_name' => 'Enríquez',
            'username'         => 'ADMIN_1',
            'email'            => 'admin@example.com',
            'email_verified_at' => Carbon::now(),
            'password'         => Hash::make('12345678'),
            'status_id' => 1,
            'role_id' => 1
        ]);
    }
}
