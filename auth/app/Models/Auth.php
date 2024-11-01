<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auth extends Model {
    use HasFactory, SoftDeletes;

    const TOKEN_LIFETIME = 2 * ( 60 * 60 );

    protected $fillable = [
        'ref_user',
        'token',
        'dt_expires',
    ];

}
