<?php

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
        $user = new \App\User();
        $user->email = 'user@user.com';
        $user->password = bcrypt('Mateuszek123321');
        $user->name = 'Admin';
        $user->save();
    }
}
