<?php

namespace App\Models;

use App\Traits\Versionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auth extends Model {
    use HasFactory, SoftDeletes, Versionable;

    const TOKEN_LIFETIME = 2 * ( 60 * 60 );

    const ACTIVE = true;
    const INACTIVE = false;
    const REF_SYSTEM_USER = 0;

    protected $fillable = [
        'ref_user',
        'token',
        'dt_expires',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
