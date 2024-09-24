<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomPhoto;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index() {
		$rooms = Room::orderBy('created_at', 'desc')->paginate(7);
		
		return view('user.rooms.index', compact('rooms'));
    }

    public function show(Room $room) {		
		return view('user.rooms.show', compact('room'));
    }
}
