<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorVisit extends Model
{
    protected $fillable = [
        'error_code',
        'url',
        'ip_address',
        'user_agent',
        'message'
    ];
}