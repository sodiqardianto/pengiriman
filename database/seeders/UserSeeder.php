<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      =>  'Superadmin',
            'email'     =>  'superadmin@gmail.com',
            'no_telp'   =>  '08123456789',
            'jabatan'   =>  'superadmin',
            'alamat'    =>  'tangerang',
            'password'  =>  bcrypt('123456')
        ]);
        $user->assignRole('superadmin');

        $user = User::create([
            'name'      =>  'User',
            'email'     =>  'user@gmail.com',
            'no_telp'   =>  '081234567891',
            'jabatan'   =>  'user',
            'alamat'    =>  'tangerang',
            'password'  =>  bcrypt('123456')
        ]);
        $user->assignRole('user');

        $user = User::create([
            'name'      =>  'Finance',
            'email'     =>  'finance@gmail.com',
            'no_telp'   =>  '081234567892',
            'jabatan'   =>  'finance',
            'alamat'    =>  'tangerang',
            'password'  =>  bcrypt('123456')
        ]);
        $user->assignRole('finance');
    }
}
