<?php

namespace Modules\Grades\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Grades\Database\Factories\GradeFactory;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    protected static function newFactory()
    {
        return GradeFactory::new();
    }
}
