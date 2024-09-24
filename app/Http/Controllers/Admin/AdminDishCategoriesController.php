<?php

namespace App\Http\Controllers\Admin;

use App\Models\DishCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use Illuminate\Http\Request;

class AdminDishCategoriesController extends Controller
{
    public function index() {
		$dishCategories = DishCategory::orderBy('created_at', 'desc')->paginate(10);
		
		return view('admin.dishes.dish-categories.index', compact('dishCategories'));
    }

    public function create() {
		return view('admin.dishes.dish-categories.create');
    }

    public function edit(DishCategory $dishCategory) {
    	return view('admin.dishes.dish-categories.edit', compact('dishCategory'));
    }

    public function store(CategoryValidation $request) {
        $validatedData = $request->validated();

        DishCategory::create($validatedData);

        return redirect()->route('admin.dish-categories.index')->with('success', 'Категория блюд успешно создана.');
    }
	
	public function update(CategoryValidation $request, DishCategory $dishCategory) {
        $validatedData = $request->validated();

        $dishCategory->update($validatedData);

        return redirect()->route('admin.dish-categories.index')->with('success', 'Категория блюд успешно изменена.');
    }
	
	public function destroy(DishCategory $dishCategory) {
		$dishCategory->delete();
		
        return redirect()->route('admin.dish-categories.index')->with('success', 'Категория блюд успешно удалена.');
	}
	
}
