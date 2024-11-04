<?php

namespace App\Models;

use App\Traits\Versionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes, Versionable;

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
        'name'     => 'max:255',
        'email'    => 'email|max:255',
        'password' => 'min:8',
        'dt_birth' => 'date',
        'cpf'      => 'size:11',
        'rg'       => 'size:9',
    ];

    const ADD_RULES_AT_CREATE = [
        'name'  => '|required',
        'email' => '|required|unique:users',
        'cpf'   => '|unique:users',
        'rg'    => '|unique:users',
    ];

    public static function RULES($isCreating = true){
        $rules = self::RULES;

        if($isCreating){
            foreach(self::ADD_RULES_AT_CREATE as $key => $addRule){
                $rules[$key] .= $addRule;
            }
        }

        return $rules;
    }
}
