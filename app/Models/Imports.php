<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imports extends Model
{
    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'importer',
        'total_rows',
    ];
}
