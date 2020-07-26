<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Resource $resource)
    {
        return view('admin.updateResource', [
            'resources' => $resource->getResources()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Resource $resource)
    {
        return view('admin.addResource', [
            'sources' => $this->sourcesAll(),
            'reaources' => $resource->getResources(),
            'categories' => $this->NewsCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceRequest $request)
    {
        $request->validate($request->rules());
        $resource = new Resource($request->all());
        $resource->save();

        return redirect(route('admin.index'))->with('success_text', 'Создание ресурса прошло успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resource $resource)
    {
        return view('admin.updateResourceById', [
            'sources' => $this->sourcesAll(),
            'resource' => $resource,
            'categories' => $this->NewsCategories()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function update(ResourceRequest $request, Resource $resource)
    {
        $request->validate($request->rules());
        $resource->fill($request->all());
        $resource->save();

        return redirect(route('admin.index'))->with('success_text', 'Обновление ресурса прошло успешно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Resource  $resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect(route('admin.index'))->with('success_text', 'Удаление ресурса прошло успешно');
    }
}
