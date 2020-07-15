<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.updateNews', [
            'news' => $this->getFirstNews()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addNews', [
            'sources' => $this->sourcesAll(),
            'categories' => $this->NewsCategories()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $request->validate($request->rules());
        $news = new News($request->all());
        $news->save();
        $news->categories()->attach($request->input('category_id'));

        return redirect(route('admin.index'))->cookie('success_text', 'Создание новости прошло успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.updateNewsById', [
            'news' => $news,
            'sources' => $this->sourcesAll(),
            'categories' => $this->NewsCategories(),
            'current_categories' => $news->categories()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\NewsUpdateRequest  $request 
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $request->validate($request->rules());
        $news->fill($request->all());
        $news->save();
        $news->categories()->sync($request->input('category_id'));

        return redirect(route('admin.index'))->cookie('success_text', 'Обновление новости прошло успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->categories()->detach();
        $news->delete();

        return redirect(route('admin.index'));
    }
}
