<?php
namespace Database\Factories;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
class TaskFactory extends Factory {
    protected $model = Task::class;
    public function definition(): array {
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'completed' => fake()->boolean(30), // 30% chance of being completed
            'due_date' => fake()->optional(0.7)->dateTimeBetween('now','+30 days'),
            'user_id' => 1,
        ];
    }
}
