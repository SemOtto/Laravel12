<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Activity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $begindate = $this->faker->dateTimeBetween('-1 month', '+1 week')->format('Y-m-d');
        $enddate = $this->faker->dateTimeBetween($begindate, '+1 month')->format('Y-m-d');

        return [
            'task' => $this->faker->sentence(6, true),
            'begindate' => $begindate,
            'enddate' => $enddate,
            'user_id' => User::factory(),
            'project_id' => Project::factory(),
            'activity_id' => Activity::factory(),
        ];
    }

    /**
     * Indicate that task has no user.
     */
    public function withoutUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => null,
            ];
        });
    }

    /**
     * Indicate that task has no enddate.
     */
    public function withoutEnddate()
    {
        return $this->state(function (array $attributes) {
            return [
                'enddate' => null,
            ];
        });
    }
}
