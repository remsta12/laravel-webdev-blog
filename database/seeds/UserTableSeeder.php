<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        $role_regular_user = Role::where('name', 'regular')->first();
        $role_admin_user = Role::where('name', 'admin')->first();

        $regular = new User();
        $regular->name = 'Malcolm Delughe';
        $regular->email = 'Malcolm Delughe@fakemail.en';
        $regular->password = bcrypt('shggitni');
        $regular->remember_token = "I'm just normal";
        $regular->save();
        $regular->roles()->attach($role_regular_user);

        $admin = new User();
        $admin->name = 'Sir Webbington';
        $admin->email = 'SirOfTheWeb135@webmaster.org';
        $admin->password = bcrypt('lordadel0');
        $regular->remember_token = "I'm quite prestigous";
        $admin->save();
        $admin->roles()->attach($role_admin_user);
    }
}
