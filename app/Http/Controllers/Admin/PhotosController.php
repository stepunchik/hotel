<?php

namespace App\Http\Controllers\admin;

use App\Models\Room;
use App\Models\RoomPhoto;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoValidation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index() {
		$rooms = Room::orderBy('created_at', 'desc')->paginate(7);
		
		return view('admin.photos.index', compact('rooms'));
    }

    public function create(Room $room) {
		return view('admin.photos.create', compact('room'));
    }

    public function edit(RoomPhoto $photo) {
        return view('admin.photos.edit', compact('photo'));
    }

	protected function storeImages(PhotoValidation $request, $id) {
		foreach($request->file('images') as $image){
			$path = $image->store('room_photos/' . $id, 'public');
			
			RoomPhoto::create([
				'image' => $path,
				'room_id' => $id,
			]);
		}
	}

    public function store(PhotoValidation $request, Room $room) {
        $validatedData = $request->validated();
		
		$this->storeImages($request, $room['id']);
		
		return redirect()->route('admin.photos.index')->with('success', 'Фото успешно создано.');
    }
	
	public function update(PhotoValidation $request, RoomPhoto $photo) {
		$validatedData = $request->validated();
		
		if ($request->hasFile('image')) {
			Storage::delete('public/' . $photo['image']);

	        $path = $request->file('image')->store('room_photos/' . $photo['room_id'], 'public');
	        $validatedData['image'] = $path;

	        $photo->update($validatedData);
	    }
		
		return redirect()->route('admin.photos.index')->with('success', 'Фото успешно обновлено.');
	}
	
	public function destroy(RoomPhoto $photo) {
		$photo->delete();	
		
		return redirect()->route('admin.photos.index')->with('success', 'Фото успешно удалены.');
	}
}
