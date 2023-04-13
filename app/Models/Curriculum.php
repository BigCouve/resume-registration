<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = "curriculum";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'desired_job',
        'schooling',
        'observations',
        'document',
        'IPV4_address',
    ];
    use HasFactory;
}
