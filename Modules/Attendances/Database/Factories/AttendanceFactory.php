<?php
namespace Modules\Attendances\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Attendances\Models\Attendance;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}