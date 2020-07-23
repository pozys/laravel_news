<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function WelcomePage()
    {
        return view('news.index', [
            'categories' => $this->NewsCategories(),
            'news' => $this->getFirstNews()
        ]);
    }

    public function workPrivacy()
    {
        return view('work_privacy');
    }
}
