<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function addFeedback(Request $request)
    {
        if($request->isMethod('post')){
            $name = $request->input('user_name');
            $feedback_text = $request->input('feedback_text');
            $delimiter = '------------------------------';
            $text = "Имя: $name \nТекст отзыва: $feedback_text \n$delimiter \n";
            file_put_contents(storage_path('app/public/feedbacks.txt'), $text, FILE_APPEND);
            $request->flash();
            return redirect(route('addFeedback'));
        }
        
        $categories = $this->NewsCategories();
        return view('feedback', ['categories' => $categories]);
    }
}
