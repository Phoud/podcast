<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('cw1234'),
            'UserType' =>'admin'
        ]);
        User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('cw1234'),
            'UserType' =>'super_admin'
        ]);
        User::create([
            'name' => 'member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('cw1234'),
            'UserType' =>'member'
        ]);
    }
}
