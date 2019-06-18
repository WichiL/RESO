<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = 'wichi';
        $user->email = 'luisjr1611@hotmail.com';
        $user->password = bcrypt('ucantseeme');
        $user->save();
    }
}
