<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuSubCategory>
 */
class MenuSubCategoryFactory extends Factory
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
            'menu_sub_cate_name' => $this->faker->word,
            'url_prefix' => $this->faker->word,
            'has_child' => $this->faker->boolean,
            'sort_order' => $this->faker->randomNumber(),
            'nums_row' => $this->faker->sentence,
            'entry_by' => $this->faker->randomNumber(),
            'entry_datetime' => $this->faker->dateTime(),
            'update_by' => $this->faker->randomNumber(),
            'update_datetime' => $this->faker->dateTime(),
            'delete_by' => $this->faker->randomNumber(),
            'delete_datetime' => $this->faker->dateTime(),
            'data_status' => 1,
            'grid_nav_sts' => 0,
        ];
    }
}
