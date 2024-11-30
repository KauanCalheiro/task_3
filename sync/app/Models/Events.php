<?php

namespace App\Models;

use App\Traits\Versionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Events extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "description",
        "dt_init",
        'dt_end',
        'location',
        'capacity'
    ];
}
