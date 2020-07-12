<?php

namespace App\Http\Controllers;

use App\Category;
use App\Feedback;
use App\News;
use App\Request as AppRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function addNews(Request $request)
    {
        if ($request->isMethod('POST')) {
            $news = new News($request->all());
            $news->save();
            $news->categories()->attach($request->input('category_id'));

            return redirect(route('admin.index'));
        }

        return view('admin.addNews', [
            'sources' => $this->sourcesAll(),
            'categories' => $this->NewsCategories()
        ]);
    }

    public function updateNews(Request $request)
    {
        if ($request->isMethod('POST')) {
        }

        return view('admin.updateNews', [
            'news' => $this->getFirstNews()
        ]);
    }

    public function deleteNews(News $news)
    {
        $news->categories()->detach();
        $news->delete();
        
        return redirect(route('admin.index'));
    }

    public function updateNewsById(Request $request, News $news)
    {
        if ($request->isMethod('POST')) {
            $news->fill($request->all());
            $news->save();
            $news->categories()->sync($request->input('category_id'));

            return redirect(route('admin.index'));
        }

        return view('admin.updateNewsById', [
            'news' => $news,
            'sources' => $this->sourcesAll(),
            'categories' => $this->NewsCategories(),
            'current_categories' => $news->categories()->get()
        ]);
    }

    public function updateCategory(Request $request)
    {
        return view('admin.updateCategory', [
            'categories' => $this->NewsCategories()
        ]);
    }

    public function deleteCategory(Category $category)
    {
        $category->news()->detach();
        $category->delete();
        
        return redirect(route('admin.index'));
    }

    public function updateCategoryById(Request $request, Category $category)
    {
        if ($request->isMethod('POST')) {
            $category->fill($request->all());
            $category->save();

            return redirect(route('admin.index'));
        }

        return view('admin.updateCategoryById', [
            'category' => $category
        ]);
    }

    public function addCategory(Request $request)
    {
        if ($request->isMethod('POST')) {
            $category = new Category($request->all());
            $category->save();

            return redirect(route('admin.index'));
        }

        return view('admin.addCategory', [
            'categories' => $this->NewsCategories(),
        ]);
    }

    public function deleteFeedback()
    {
        return view('admin.deleteFeedback', [
            'feedbacks' => $this->feedbacksAll(),
        ]);
    }

    public function deleteFeedbackById(Request $request, Feedback $feedback)
    {
        if ($request->isMethod('DELETE')) {
            $feedback->delete();

            return redirect(route('admin.index'));
        }

        return view('admin.deleteFeedbackById', [
            'feedback' => $feedback,
        ]);
    }

    public function deleteRequest()
    {
        return view('admin.deleteRequest', [
            'requests' => $this->requestsAll(),
        ]);
    }

    public function deleteRequestById(Request $request, AppRequest $appRequest)
    {
        if ($request->isMethod('DELETE')) {
            $appRequest->delete();

            return redirect(route('admin.index'));
        }

        return view('admin.deleteRequestById', [
            'request' => $appRequest,
        ]);
    }
}
