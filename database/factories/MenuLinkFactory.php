<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuLink>
 */
class MenuLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'menu_group_id' => null, // Modify this to generate random menu_group_id if needed
            'menu_cate_id' => null, // Modify this to generate random menu_cate_id if needed
            'menu_sub_cate_id' => null, // Modify this to generate random menu_sub_cate_id if needed
            'menu_operation' => $this->faker->word,
            'menu_link_name' => $this->faker->word,
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
