<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pin' => $this->faker->numerify('##########'),
            'name' => $this->faker->name,
            'user_id' => $this->faker->unique()->userName,
            'user_group_id' => $this->faker->numberBetween(1, 10),
            'mobile_number' => $this->faker->phoneNumber,
            'email_address' => $this->faker->unique()->safeEmail,
            'password_log' => bcrypt('password'),
            'location' => $this->faker->city,
            'remarks' => $this->faker->sentence,
            'admin_status' => 0,
            'password_change_status' => null,
            'password_change_datetime' => null,
            'verify_status' => null,
            'lock_status' => 0,
            'block_status' => 0,
            'user_address' => $this->faker->address,
            'password_expiry_date' => null,
            'data_status' => 1,
            'entry_by' => 1,
            'entry_datetime' => now(),
            'verify_by' => null,
            'verify_datetime' => null,
            'last_modified_by' => null,
            'last_modified_datetime' => null,
            'delete_by' => null,
            'delete_datetime' => null,
            'block_by' => null,
            'block_datetime' => null,
            'unblock_by' => null,
            'unblock_datetime' => null,
            'SESSION_idle_time' => 58,
            'global_session_time' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
