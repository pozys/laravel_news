<?php

namespace App\Services;

use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XmlParserService
{
    public function parseYandexMusic()
    {
        $xml = XmlParser::load('https://news.yandex.ru/music.rss');
        $data = $xml->parse(
            [
                'news' => ['uses' => 'channel.item[title,description,guid]']
            ]
        );

        $data['news'] = array_map(function ($item) {
            $item += ['body' => $item['description']];
            return $item += ['brief' => mb_substr($item['description'], 0, 200)];
        }, $data['news']);

        return $data;
    }

    public function createNewsAfterParsing($news, $source_id, $category_id)
    {
        $count = 0;
        foreach ($news['news'] as $item) {
            $found = News::where([
                ['source_id', $source_id],
                ['ext_id', $item['guid']]
            ])->first();

            if (!is_null($found)) {
                continue;
            };

            $newItem = new News($item);
            $newItem->source_id = $source_id;
            $newItem->ext_id = $item['guid'];
            $newItem->save();
            $newItem->categories()->attach($category_id);
            $count++;
        }

        return $count;
    }
}
