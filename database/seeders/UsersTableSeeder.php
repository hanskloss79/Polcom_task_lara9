<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fill in data into users table - 'test1', 'test2', 'admin' 
        DB::table('users')->insert([
            [
                'name' => 'test1',
                'email' => 'test1@task.com',
                'password' => Hash::make('test1'),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'test2',
                'email' => 'test2@task.com',
                'password' => Hash::make('test2'),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@task.com',
                'password' => Hash::make('admin'),
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
