<?php

use App\Model\User;
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
        $this->insertUsers();
    }

    // this function will create dummy users
    public function insertUsers()
    {
        User::insert([
            'id' => 1,
            'name' => "toqeer",
            'email' => "toqeer@gmail.com",
            'is_admin' => 1,     // admin
            'status' => 1,
            'image' => "1.jpg",
            'password' => Hash::make('admin123'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        User::insert([
            'id' => 2,
            'name' => "ali",
            'email' => "ali@gmail.com",
            'is_admin' => 0,     // admin
            'status' => 1,
            'image' => "2.jpg",
            'password' => Hash::make('user123'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        User::insert([
            'id' => 3,
            'name' => "tahir",
            'email' => "tahir@gmail.com",
            'is_admin' => 1,     // admin
            'status' => 1,
            'image' => "3.jpg",
            'password' => Hash::make('user123'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        User::insert([
            'id' => 4,
            'name' => "hamza",
            'email' => "hamza@gmail.com",
            'is_admin' => 1,     // admin
            'status' => 1,
            'image' => "3.jpg",
            'password' => Hash::make('user123'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => null,
        ]);
    }
}
