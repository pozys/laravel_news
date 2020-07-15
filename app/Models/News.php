<?php

namespace App\Models;

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

    public static function customAttributes()
    {
        return [
            'title'=>'Заголовок новости',
            'brief'=>'Краткое описание новости',
            'body'=>'Текст новости',
            'source_id'=>'Источник новости',
            'category_id'=>'Категория новости',
        ];
    }

    public static function validationRules()
    {
        return [
            'title' => 'required|max:150',
            'brief' => 'required|max:200',
            'body' => 'required',
            'source_id' => 'required|integer|min:1|exists:sources,id',
            'category_id' => 'required|array',
        ];
    }
}
