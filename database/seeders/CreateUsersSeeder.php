<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = [
            [
               'name'=>'Raka',
               'email'=>'rakahikmah@gmail.com',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'TestFullStack',
               'email'=>'fullstack@gmail.com',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
