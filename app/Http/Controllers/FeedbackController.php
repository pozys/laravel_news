<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function addFeedback(Request $request)
    {
        if($request->isMethod('post')){
            $feedback = new Feedback();
            $feedback->fill($request->all());
            $feedback->save();
            $request->flash();
            return redirect(route('addFeedback'));
        }
        
        return view('feedback', ['categories' => $this->NewsCategories()]);
    }
}
