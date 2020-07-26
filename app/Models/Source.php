<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    const PREDEFINED_SOURCES = [
        'cbs' => ['id' => 2, 'domainName' => 'https://www.cbs.com/'],
        'yandex' => ['id' => 1, 'domainName' => 'https://yandex.ru/'],
        'crb' => ['id' => 3, 'domainName' => 'https://cbr.ru/']
    ];

    public static function yandexSourceId(): int
    {
        return self::getSourceId(self::PREDEFINED_SOURCES['yandex']);
    }

    public static function cbsSourceId(): int
    {
        return self::getSourceId(self::PREDEFINED_SOURCES['cbs']);
    }

    public static function crbSourceId(): int
    {
        return self::getSourceId(self::PREDEFINED_SOURCES['crb']);
    }

    private static function getSourceId($source): int
    {
        return $source['id'];
    }

    public function getPredefinedSources(): array
    {
        return self::PREDEFINED_SOURCES;
    }

    public function resources()
    {
        return $this->hasMany('App\Models\Resource');
    }
}
