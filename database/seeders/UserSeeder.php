<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $daftarUser = [
            ['Admin Thauma', 'admin@thauma.test', 'admin'],
            ['Editor Thauma', 'editor@thauma.test', 'editor'],
            ['Member Thauma', 'member@thauma.test', 'member'],
        ];

        foreach ($daftarUser as $item) {
            $user = new User();
            $user->name = $item[0];
            $user->email = $item[1];
            $user->password = Hash::make('password');
            $user->role = $item[2];
            $user->save();
        }
    }
}