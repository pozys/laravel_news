<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    function WelcomePage()
    {
        return view('news.index', [
            'categories' => $this->NewsCategories(),
            'news' => $this->getFirstNews()
        ]);
    }
}
