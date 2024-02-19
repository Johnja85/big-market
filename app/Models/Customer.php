<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'name',
        'address',
        'email',
        'phone',
        'country',
        'city',
        'image',
        'is_active'
    ];
}
