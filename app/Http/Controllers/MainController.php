<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function WelcomePage()
    {
        $categories = $this->NewsCategories();
        $news = $this->getFirstNews(10);
        return view('news.index', ['categories' => $categories, 'news' => $news]);
    }
}
