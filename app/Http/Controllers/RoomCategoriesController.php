<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomCategoriesController extends Controller
{
	public function index() {
		$roomCategories = RoomCategory::orderBy('created_at', 'desc')->paginate(10);
		
		return view('user.room-categories.index', compact('roomCategories'));
	}

    public function roomsFromCategory($categoryId) {
        $rooms = Room::where('category_id', $categoryId)
                      ->orderBy('rooms.created_at', 'desc')
                      ->paginate(10);
        
        return view('user.rooms.index', compact('rooms'));
    }
}
