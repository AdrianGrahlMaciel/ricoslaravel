<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'country_id',
        'city_id',
        'zone_id',
        'phone',
        'legal_name',
        'ruc',
        'phone',
        'cellphone',
        'email',
        'website',
        'address_one',
        'address_two',
        'latitude',
        'longitude',
        'logo',
    ];
}
