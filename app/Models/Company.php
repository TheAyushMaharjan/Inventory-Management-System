<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

   
    protected $fillable = [
        'owner_id',
        'name',
        'email',
        'logo',
        'website',
        'status',
        'address',
        'phone_1',
        'phone_2',
        'color',
        'slogan',
        'facebook',
        'twitter',
    ];
}