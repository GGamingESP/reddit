<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        //$title = $this->faker->words(2,true);

        return [
            //
            'title' => "",
            'slug' => $this->faker->slug,
            'color' => "red"
        ];
    }
}
