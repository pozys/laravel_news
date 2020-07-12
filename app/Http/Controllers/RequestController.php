<?php

namespace App\Http\Controllers;

use App\Request as AppRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function addRequest(Request $request)
    {
        if($request->isMethod('post')){
            $newRequest = new AppRequest();
            $newRequest->fill($request->all());
            $newRequest->save();
            $request->flash();
            return redirect(route('addRequest'));
        }
        
        return view('info_request', ['categories' => $this->NewsCategories()]);
    }
}
