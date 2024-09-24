<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Review;
use App\Models\RoomPhoto;
use App\Models\PageContent;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
		$services = Service::latest()->take(5)->get();
		$reviews = Review::all();
		$photos = RoomPhoto::latest()->take(5)->get();
		$info = PageContent::where('section', 'info')->first();
		$rules = PageContent::where('section', 'rules')->first();
		
		return view('user.about.index', compact('services', 'reviews', 'photos', 'info', 'rules'));
    }
}
