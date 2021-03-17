<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'path',
        'type',
    ];
}
