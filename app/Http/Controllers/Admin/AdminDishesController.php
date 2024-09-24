<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Models\DishCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishValidation;
use Illuminate\Http\Request;

class AdminDishesController extends Controller
{
    public function index() {
		$dishes = Dish::orderBy('created_at', 'desc')->paginate(10);
		$dishCategories = DishCategory::all();
		
		return view('admin.dishes.dishes.index', compact('dishes', 'dishCategories'));
    }

    public function create() {
		$dishCategories = DishCategory::all();
		
		return view('admin.dishes.dishes.create', compact('dishCategories'));
    }

    public function edit(Dish $dish) {
		$dishCategories = DishCategory::all();

		return view('admin-panel.dishes.dishes.edit', compact('dish', 'dishCategories'));
    }

    public function store(DishValidation $request) {
        $validatedData = $request->validated();
		
		$path = $request->file('image')->store('dishes', 'public');
		
		Dish::create([
			'name' => $validatedData['name'],
            'ingredients' => $validatedData['ingredients'],
			'image' => $path,
			'price' => $validatedData['price'],
            'category_id' => $validatedData['category_id'],
		]);
		
		return redirect()->route('admin.dishes.index')->with('success', 'Блюдо создано успешно.');
    }
	
	public function update(DishValidation $request, Dish $dish) {
		$validatedData = $request->validated();
		
		if ($request->hasFile('image')) {
			if ($dish->image) {
				Storage::delete('public/' . $dish->image);
			}

			$imagePath = $request->file('image')->store('dishes', 'public');
			$validatedData['image'] = $imagePath;
		} else {
			$validatedData['image'] = $dish->image;
		}

		$dish->update($validatedData);
		
		return redirect()->route('admin.dishes.index')->with('success', 'Блюдо успешно изменено.');
	}
	
	public function destroy(Dish $dish) {		
		Storage::delete('public/' . $dish->image);

		$dish->delete();
		
		return redirect()->route('admin.dishes.index')->with('success', 'Блюдо успешно удалено.');
	}
}
