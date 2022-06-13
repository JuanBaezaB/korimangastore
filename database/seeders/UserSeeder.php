<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $user = new User();
        $user->name = 'test';
        $user->email = 'admin@admin.cl';
        $user->password = Hash::make('test');
        $user->save();
        $user->assignRole('Admin');

        $user = new User();
        $user->name = 'Juan';
        $user->email = 'user@user.cl';
        $user->password = Hash::make('test');
        $user->save();
        $user->assignRole('User');

      
    }
}
