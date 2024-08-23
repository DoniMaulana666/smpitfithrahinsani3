<?php

namespace Modules\Teachers\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Teachers\Database\Factories\TeacherFactory;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['teachers_name', 'subjects_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjects_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'teachers_name');
    }

    protected static function newFactory()
    {
        return TeacherFactory::new();
    }
}
