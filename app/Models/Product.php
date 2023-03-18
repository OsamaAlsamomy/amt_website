<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable =[
        'name',
        'desc',
        'views',
        'state',
        'img',
        'price',
        'discount',
        'top',
        'sec_id',
        'created_by',
        'updated_by',

    ];
}
