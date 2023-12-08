<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequestLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'token',
        'session_id',
        'ip',
        'url',
        'method',
        'request',
        'response',
        'error',
        'request_time',
        'execution_time',
    ];

    protected $casts = [
        'request' => 'array',
        'response' => 'array',
    ];

}
