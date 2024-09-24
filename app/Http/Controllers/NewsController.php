<?php

namespace App\Http\Controllers;

use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show(News $news) {		
		return view('user.news.show', compact('news'));
    }
}
