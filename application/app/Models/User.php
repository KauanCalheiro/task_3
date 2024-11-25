<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Versionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
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
        'password' => ['min:8'],
        'dt_birth' => ['date'],
        'cpf'      => ['size:11'],
        'rg'       => ['size:9'],
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
