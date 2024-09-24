<?php

namespace App\Http\Controllers;

use App\Models\Review;

use App\Http\Requests\ReviewValidation;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create() {
		return view('user.review.create');
    }

    public function store(ReviewValidation $request) {
        $validatedData = $request->validated();
		
		Review::create([
			'author' => auth()->user()->name,
			'text' => $validatedData['text'],
			'rating' => $validatedData['rating'],
			'approved' => false,
		]);
		
		return redirect()->route('about.index')->with('success', 'Отзыв создан успешно.');
    }
}
