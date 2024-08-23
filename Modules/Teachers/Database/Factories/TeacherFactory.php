<?php
namespace Modules\Teachers\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Teachers\Models\Teacher;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}