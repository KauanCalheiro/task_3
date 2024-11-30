<?php

namespace App\Models;

use App\Traits\Versionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendances extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "ref_inscription",
    ];
}