<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Versionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

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
    ];

    const BASE_RULES = [
        'name'     => ['max:255'],
        'email'    => ['email', 'max:255'],
        'dt_birth' => ['date'],
        'cpf'      => ['max:255'],
        'rg'       => ['max:255'],
    ];

    const CREATE_RULES = [
        'name'  => ['required'],
        'email' => ['required', 'unique:users'],
        'cpf'   => ['unique:users'],
        'rg'    => ['unique:users'],
    ];

    public static function RULES($isCreating = true){
        return $isCreating 
            ? array_merge(self::BASE_RULES, self::CREATE_RULES) 
            : self::BASE_RULES;
    }
}
