<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "dt_init",
        "dt_end",
        "location",
        "capacity",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    const CREATE_RULES = [
        'name'  => ['required'],
        'description'  => ['required'],
        'dt_init' => ['required'],
        'dt_end' => ['required'],
        'capacity' => ['required']
        
    ];

    public static function RULES($isCreating = true){
        return $isCreating 
            ? array_merge(self::CREATE_RULES) 
            : NULL;
    }
}
