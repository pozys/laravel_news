<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNewsByCategoryId(int $id)
    {
        $news = Category::find($id)->news()->orderBy('created_at', 'desc')->paginate($this->pagination_number_of_items);

        if (!$news) {
            return abort(404);
        }

        return view('news.news_category', [
            'news' => $news,
            'categories' => $this->NewsCategories()
        ]);
    }

    public function getNewsById(News $news)
    {
        return view('news.news_item', [
            'news' => $news,
            'categories' => $this->NewsCategories()
        ]);
    }    
}
