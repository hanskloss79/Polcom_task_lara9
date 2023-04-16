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
        if(\App\Models\User::all()->where('two_factor_secret',!null)->count()>0)
            $this->call(PostsTableSeeder::class);
        else
            echo "Proszę wprowadzić do bazy przynajmniej jednego użytkownika z aktywnym uwierzytelnianiem dwuetapowym!!!";
    }
}
