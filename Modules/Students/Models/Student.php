<?php

namespace Modules\Students\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Students\Database\Factories\StudentFactory;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['grades_id', 'student_name'];

    protected static function newFactory()
    {
        return StudentFactory::new();
    }
}
