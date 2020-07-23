<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\XmlParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function parseYandexMusic()
    {
        $XmlParserService = (new XmlParserService);
        $news = $XmlParserService->parseYandexMusic();

        $source_id = Source::yandexMusicSourceId();
        $category_id = Category::yandexMusicCategoryId();

        $count = $XmlParserService->createNewsAfterParsing($news, $source_id, $category_id);

        return redirect(route('admin.index'))->with('success_text', 'Загрузка новостей завершена успешно. Добавлено новостей: ' . $count);
    }
}
