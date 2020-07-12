<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_name',
        'phone',
        'mail',
        'request_text'
    ];
}
