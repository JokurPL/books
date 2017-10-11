<?php

use Illuminate\Database\Seeder;
use App\Roles;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Roles::where('name', 'Administrator')->first();

        $user = new \App\User();
        $user->email = 'user@user.com';
        $user->password = bcrypt('Mateuszek123321');
        $user->name = 'Admin';
        $user->save();
        $user->roles()->attach($role);

        $user = new \App\User();
        $user->email = 'user2@user.com';
        $user->password = bcrypt('Mateuszek123321');
        $user->name = 'Redaktor';
        $user->save();
        $user->roles()->attach(2);

        $user = new \App\User();
        $user->email = 'user3@user.com';
        $user->password = bcrypt('Mateuszek123321');
        $user->name = 'user';
        $user->save();
        $user->roles()->attach(3);
    }
}
