<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;
    protected $table = "adds";
    protected $fillable = [
        'add1',
        'add2',
        'add3',
        'add4',
        'add5',
        'updated_by'
    ];
}
