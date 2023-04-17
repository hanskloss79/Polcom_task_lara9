<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // wprowadzenie do bazy 3 użytkowników
        $this->call(UsersTableSeeder::class);

        if(\App\Models\User::all()->count()>0)
            $this->call(PostsTableSeeder::class);
        else
            echo "Proszę wprowadzić do bazy przynajmniej jednego użytkownika";
    }
}
