<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // to generate randomly the 'user_id' for Users in database who have
        // two-factor authentication enabled 
        $users = \App\Models\User::all()->where('two_factor_secret', !null);
        $setUsersId = array();
        foreach($users as $user)
        {
            $setUsersId[] = $user->id;
        }

        return [
            'title' => $this->faker->text(20),
            'created_at' => date("Y-m-d H:i:s"),
            'user_id' =>  $setUsersId[array_rand($setUsersId)],
        ];
    }
}
