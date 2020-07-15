<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_categories_relations');
    }

    public static function customAttributes()
    {
        return [
            'name'=>'Наименование категории',
        ];
    }

    public static function validationRules()
    {
        return [
            'name' => 'required|max:70',
        ];
    }
}
