<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Malcolm Delughe';
        $user->email = 'Malcolm Delughe@fakemail.en';
        $user->password = bcrypt('shggitni');
        $user->save();
        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
