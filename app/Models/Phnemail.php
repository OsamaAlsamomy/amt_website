<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phnemail extends Model
{
    use HasFactory;
    protected $table = 'phnemail';
    protected $fillable = [
        'name',
        'content',
        'state',
        'updated_by'
    ];
}