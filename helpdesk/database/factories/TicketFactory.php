<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'filetype' => $this->faker->optional()->randomElement(['pdf', 'jpg', 'png']),
            'filelink' => $this->faker->optional()->url,
            'status' => $this->faker->randomElement(['open', 'closed']),
            'department' => $this->faker->word,
            // 'requester' => $this->faker->name,'user_id' => User::factory(), 
            'requester_id' => User::factory(),
            //'last_reply' => $this->faker->dateTimeBetween('-1 week', 'now'),
            //'last_replier' => $this->faker->optional()->dateTime
        ];
    }
}
