<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    protected $table = 'user_sessions';


    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'session_id',
        'last_activity',
    ];


    public $timestamps = true;
}
