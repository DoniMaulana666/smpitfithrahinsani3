<?php

namespace Modules\Attendances\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Attendances\Database\Factories\AttendanceFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'attendances_teacher_id',
        'attendances_subject_id',
        'attendances_grade_id',
        'attendances_student_id',
        'attendances_status'
    ];

    protected $casts = [
        'attendances_student_id' => 'array',
        'attendances_status' => 'array'
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'attendance_student', 'attendance_id', 'student_id');
    }
}