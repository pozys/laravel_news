<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const PREDEFINED_CATEGORIES = [
        'Политика' => 1,
        'Спорт' => 2,
        'Музыка' => 3,
        'Прочее' => 4
    ];

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
            'name' => 'Наименование категории',
        ];
    }

    public static function validationRules()
    {
        return [
            'name' => 'required|max:70',
        ];
    }

    public static function MusicCategoryId(): int
    {
        return self::PREDEFINED_CATEGORIES['Музыка'];
    }

    public static function SportCategoryId(): int
    {
        return self::PREDEFINED_CATEGORIES['Спорт'];
    }

    public static function PoliticsCategoryId(): int
    {
        return self::PREDEFINED_CATEGORIES['Политика'];
    }

    public static function PtherCategoryId(): int
    {
        return self::PREDEFINED_CATEGORIES['Прочее'];
    }

    public function getPredefinedCategories(): array
    {
        return self::PREDEFINED_CATEGORIES;
    }
}
