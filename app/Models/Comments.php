<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'blogscomments';
    protected $fillable = [
        'name',
        'email',
        'comment',
        'blog_id',

    ];
}
