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
        // getting randomly the 'user_id'
        return [
            'title' => $this->faker->text(20),
            'created_at' => date("Y-m-d H:i:s"),
            'user_id' => \App\Models\User::all()->random()->id,
        ];
    }
}
