<?php

namespace Modules\Posts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Posts\Database\Factories\PostFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'post_title', 'post_description'];

    protected static function newFactory()
    {
        return PostFactory::new();
    }
}
