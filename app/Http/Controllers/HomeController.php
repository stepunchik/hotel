<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Review;
use App\Models\PageContent;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
		$news = News::latest()->take(5)->get();

		$reviews = Review::all();
		
		$about = PageContent::where('section', 'about')->first();
		
		return view('user.home', compact('news', 'reviews', 'about'));
    }
}
