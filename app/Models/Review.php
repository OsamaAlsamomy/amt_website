<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'customer_review';
    protected $fillable = [
        'name',
        'logo',
        'adjective',
        'review',
        'state',
        'created_by',
        'updated_by'
    ];
}