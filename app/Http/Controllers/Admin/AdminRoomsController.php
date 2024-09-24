<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\RoomPhoto;
use App\Models\RoomCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomValidation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminRoomsController extends Controller
{
    public function index() {
		$roomCategories = RoomCategory::all();
		$rooms = Room::orderBy('created_at', 'desc')->paginate(10);
		
		return view('admin.rooms.rooms.index', compact('rooms', 'roomCategories'));
    }

    public function create() {
		$roomCategories = RoomCategory::all();
		
		return view('admin.rooms.rooms.create', compact('roomCategories'));
    }

    public function edit(Room $room) {
		$roomCategories = RoomCategory::all();

		return view('admin.rooms.rooms.edit', compact('room', 'roomCategories'));
    }
	
	protected function storeImages(RoomValidation $request, $id) {
		foreach($request->file('images') as $image) {
			$path = $image->store('room_photos/' . $id, 'public');
			
			RoomPhoto::create([
				'image' => $path,
				'room_id' => $id,
			]);
		}
	}

    public function store(RoomValidation $request) {
        $validatedData = $request->validated();

		$room = Room::create([
			'name' => $validatedData['name'],
            'description' => $validatedData['description'],
			'beds_num' => $validatedData['beds_num'],
			'price' => $validatedData['price'],
            'category_id' => $validatedData['category_id'],
		]);
		
		AdminRoomsController::storeImages($request, $room['id']);
		
		return redirect()->route('admin.rooms.index')->with('success', 'Номер создан успешно.');
    }
	
	public function update(RoomValidation $request, Room $room) {
		$validatedData = $request->validated();

		if ($request->hasFile('images')) {	
			foreach($room->photos as $photo) {
				Storage::delete('public/' . $photo['image']);
				$photo->delete();
			}		
			AdminRoomsController::storeImages($request, $room['id']);
		}

		$room->update([
			'name' => $validatedData['name'],
            'description' => $validatedData['description'],
			'beds_num' => $validatedData['beds_num'],
			'price' => $validatedData['price'],
            'category_id' => $validatedData['category_id'],
		]);
		
		return redirect()->route('admin.rooms.index')->with('success', 'Номер успешно изменен.');
	}
	
	public function destroy(Room $room) {
		$roomPhotos = RoomPhoto::where('room_id', $room['id']);
		
		foreach($roomPhotos as $roomPhoto) {
			Storage::delete('public/' . $roomPhoto['image']);
			$roomPhoto->delete();
		}	

		$room->delete();
		
		return redirect()->route('admin.rooms.index')->with('success', 'Номер успешно удален.');
	}
}
