<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoRequest;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.deleteRequest', [
            'requests' => $this->requestsAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('info_request', ['categories' => $this->NewsCategories()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRequest = new InfoRequest();
        $newRequest->fill($request->all());
        $newRequest->save();
        $request->flash();
        return redirect(route(
            'info_requests.show',
            [
                'info_request' => $newRequest
            ]
        ))
            ->with('success_text', 'Ваш запрос успешно зарегистрирован');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfoRequest  $infoRequest
     * @return \Illuminate\Http\Response
     */
    public function show(InfoRequest $infoRequest)
    {
        return view('admin.deleteRequestById', [
            'request' => $infoRequest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoRequest  $infoRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoRequest $infoRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoRequest  $infoRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoRequest $infoRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoRequest  $infoRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoRequest $infoRequest)
    {
        $infoRequest->delete();

        return redirect(route('admin.index'))->with('success_text', 'Удаление данных прошло успешно');
    }
}
