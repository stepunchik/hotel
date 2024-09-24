<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use Illuminate\Http\Request;

class AdminRoomCategoriesController extends Controller
{
    public function index() {
		$roomCategories = RoomCategory::orderBy('created_at', 'desc')->paginate(5);
		
		return view('admin.rooms.room-categories.index', compact('roomCategories'));
    }

    public function create() {
		return view('admin.rooms.room-categories.create');
    }

    public function edit(RoomCategory $roomCategory) {
    	return view('admin.rooms.room-categories.edit', compact('roomCategory'));
    }

    public function store(CategoryValidation $request) {
        $validatedData = $request->validated();

        RoomCategory::create($validatedData);

        return redirect()->route('admin.room-categories.index')->with('success', 'Категория номеров успешно создана.');
    }
	
	public function update(CategoryValidation $request, RoomCategory $roomCategory) {
        $validatedData = $request->validated();

        $roomCategory->update($validatedData);

        return redirect()->route('admin.room-categories.index')->with('success', 'Категория номеров успешно изменена.');
    }
	
	public function destroy(RoomCategory $roomCategory) {
		$roomCategory->delete();
		
        return redirect()->route('admin.room-categories.index')->with('success', 'Категория номеров успешно удалена.');
	}
}
