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
        App\User::create([
            'name'=> 'Ricardo Montero',
            'email'=> 'ricardo@montero.me',
            'password'=> bcrypt('123456'),
        ]);
    }
}
