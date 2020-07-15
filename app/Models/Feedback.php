<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_name',
        'feedback_text'
    ];
}
