<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index() {
		$reviews = Review::orderBy('created_at', 'desc')->paginate(7);
		
		return view('admin.reviews.index', compact('reviews'));
    }
	
	public function approve(Review $review) {
		$review['approved'] = true;
		$review->save();
		
		return redirect()->route('admin.reviews.index')->with('success', 'Отзыв успешно одобрен.');
	}
	
	public function destroy(Review $review) {
		$review->delete();
		
		return redirect()->route('admin.reviews.index')->with('success', 'Отзыв успешно удален.');
	}
}
