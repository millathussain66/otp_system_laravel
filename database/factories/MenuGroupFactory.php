<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuGroup>
 */
class MenuGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sort_name' => $this->faker->word,
            'menu_name' => $this->faker->word,
            'has_child' => $this->faker->boolean,
            'url_prefix' => $this->faker->word,
            'sort_order' => $this->faker->randomNumber(),
            'entry_by' => $this->faker->randomNumber(),
            'entry_datetime' => $this->faker->dateTime(),
            'update_by' => $this->faker->randomNumber(),
            'update_datetime' => $this->faker->dateTime(),
            'delete_by' => $this->faker->randomNumber(),
            'delete_datetime' => $this->faker->dateTime(),
            'data_status' => 1,
        ];
    }
}
