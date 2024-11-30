<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use SoftDeletes;

    protected $table = 'certificates';

    protected $fillable = [
        'id',
        'ref_inscription',
        'server_path',
        'validation_code',
    ];

    const RULES = [
        'ref_inscription' => ['required', 'numeric'],
    ];

    public function getArquivePath()
    {
        return __DIR__.'/../certificates/';
    }
}
