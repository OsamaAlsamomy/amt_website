<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $table = 'sections';
    protected $fillable =[
        'name',
        'img',
        'desc',
        'state',
        'created_by',
        'updated_by'
    ];
}
