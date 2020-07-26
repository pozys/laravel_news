<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'name',
        'resource',
        'source_id',
        'category_id'
    ];

    public $timestamps = false;

    public function getResources()
    {
        return Resource::all();
    }
}
