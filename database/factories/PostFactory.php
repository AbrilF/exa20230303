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
        return [
            'title' => $this->faker->unique()->sentence(),
            'body' => $this->faker->text(),
            'is_published' => 1,
            //añadimos esto para la relacion uno a muchos
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 
