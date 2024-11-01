<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    const ACTIVE = 1;

    protected $fillable = [
        "name",
        "email",
        "password",
        'dt_birth',
        'cpf',
        'rg',
    ];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
        'deleted_by',
        'version',
        'is_active',
    ];

    const RULES = [
        'name'     => 'required|max:255',
        'email'    => 'required|email|max:255|unique:users',
        'password' => 'min:8',
        'dt_birth' => 'date',
        'cpf'      => 'size:11|unique:users',
        'rg'       => 'size:9|unique:users',
    ];
}
