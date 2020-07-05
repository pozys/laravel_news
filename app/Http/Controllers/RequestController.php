<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function addRequest(Request $request)
    {
        if($request->isMethod('post')){
            $name = $request->input('user_name');
            $phone = $request->input('phone');
            $mail = $request->input('mail');
            $request_text = $request->input('request_text');
            $delimiter = '------------------------------';
            $text = "Имя: $name \nТелефон: $phone \nЭлектронная почта: $mail  \nТекст запроса: $request_text \n $delimiter\n";
            file_put_contents(storage_path('app/public/requests.txt'), $text, FILE_APPEND);
            $request->flash();
            return redirect(route('addRequest'));
        }
        
        return view('info_request', ['categories' => $this->NewsCategories()]);
    }
}
