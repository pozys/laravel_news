<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoRequest extends Model
{
    protected $table = 'requests';
    public $timestamps = false;
    protected $fillable = [
        'user_name',
        'phone',
        'mail',
        'request_text'
    ];
}
