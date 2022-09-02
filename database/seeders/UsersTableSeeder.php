<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$user = \App\Models\User::create([
            'name'     => 'Administration Department',
    		'email'    => 'admin@example.com',
    		'password' => bcrypt('password'),
            'role'     => 'Administration',
    	]);*/

        $user = \App\Models\User::create([
            'name'     => 'Vice Chancellor',
            'email'    => 'vc@example.com',
            'password' => bcrypt('12345678'),
            'role'     => 'Chairman',
        ]);

        $user->assignRole('Chairman');
    }
}
