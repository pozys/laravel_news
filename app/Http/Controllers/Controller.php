<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function NewsCategories()
    {
        $result = DB::table('categories')->select('id', 'name')->orderBy('id')->get();

        return $result;
    }

    protected function getFirstNews(int $numberOfNews)
    {
        $result = DB::table('news')->select('id', 'title', 'brief', 'created_at')->latest()->take($numberOfNews)->get();

        return $result;
    }

    protected function NewsByCategoryId(int $id)
    {
        return DB::table('news')
            ->join('news_categories_relations', 'news.id', '=', 'news_categories_relations.news_id')
            ->join('categories', 'news_categories_relations.category_id', '=', 'categories.id')
            ->select('news.id', 'title', 'brief', 'news.created_at')->where('news_categories_relations.category_id', '=', $id)
            ->get();
    }
}
