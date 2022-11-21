<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
			'user_id'     => fake()->numberBetween(1, 2),
			'title'       => fake()->text(30),
			'description' => fake()->text(150),
			'body'        => fake()->text(100),
			'visible'     => fake()->boolean(),
			'published'   => fake()->date('Y-m-d'),
		];
	}
}
