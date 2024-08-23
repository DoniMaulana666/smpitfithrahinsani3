<?php
namespace Modules\Grades\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Grades\Models\Grade;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}