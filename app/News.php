<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'brief',
        'body',
        'source_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories_relations');
    }
}
