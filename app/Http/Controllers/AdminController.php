<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $success_text = $request->cookie('success_text');
        
        return view('admin.index', ['success_text' => $success_text]);
    }
}
