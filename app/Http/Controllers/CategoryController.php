<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getNewsCategories()
    {
        $result = [];
        $categories = $this->NewsCategories();
        foreach ($categories as $category) {
            $result[] = '<h3><a href=' . route('categories.getNewsByCategoryId', $category['category_id']) . '>' . $category['category_name'] . '</a></h3>';
        }

        return $result;
    }
}
