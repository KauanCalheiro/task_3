<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "ref_user",
        "ref_event",
        "dt_inscription"
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    const CREATE_RULES = [
        "ref_user" => ['required'],
        "ref_event" => ['required'],
        "dt_inscription" => ['required']
    ];

    public static function RULES($isCreating = true){
        return $isCreating 
            ? array_merge(self::CREATE_RULES) 
            : NULL;
    }
}
