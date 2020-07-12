<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feedback;
use App\News;
use App\Request as RequestApp;
use App\Source;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $pagination_number_of_items = 6;
    protected function NewsCategories()
    {
        $result = Category::query()
        ->select('id', 'name')
        ->orderBy('id')
        ->get();

        return $result;
    }

    protected function getFirstNews()
    {
        $result = News::query()
        ->select('id', 'title', 'brief', 'created_at')
        ->orderBy('created_at', 'desc')
        ->paginate($this->pagination_number_of_items);

        return $result;
    }

    protected function NewsByCategoryId(int $id)
    {
        return News::query()
            ->join('news_categories_relations', 'news.id', '=', 'news_categories_relations.news_id')
            ->join('categories', 'news_categories_relations.category_id', '=', 'categories.id')
            ->select('news.id', 'title', 'brief', 'news.created_at')->where('news_categories_relations.category_id', '=', $id)
            ->get();
    }

    public function sourcesAll()
    {
        return Source::all();
    }

    public function feedbacksAll()
    {
        return Feedback::all();
    }

    public function requestsAll()
    {
        return RequestApp::all();
    }
}
