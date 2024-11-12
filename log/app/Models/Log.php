<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $table = "request_logs";

    protected $fillable = [
        'request_path',
        'request_method',
        'request_body',
        'request_headers',
        'request_params',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RULES = [
        'request_path'    => ['required', 'string'],
        'request_method'  => ['required', 'string'],
        'request_headers' => ['required', 'json'],
        'request_body'    => ['json'],
        'request_params'  => ['json'],
    ];
}
