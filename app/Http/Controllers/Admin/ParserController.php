<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Source;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function parseYandex()
    {
        $source_id = Source::yandexSourceId();
        $resources = Source::find($source_id)->resources;

        foreach ($resources as $item) {
            NewsParsing::dispatch($item, $source_id);
        }

        return redirect(route('admin.index'))->with('success_text', 'Загрузка новостей Яндекс завершена успешно.');
    }
}
