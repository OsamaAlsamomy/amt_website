<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $tabel = 'blogs';
    protected $fillable =[
        'name',
        'img',
        'desc',
        'state',
        'created_by',
        'updated_by'
    ];
}
