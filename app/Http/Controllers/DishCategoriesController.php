<?php

namespace App\Http\Controllers;

use App\Models\DishCategory;

use Illuminate\Http\Request;

class DishCategoriesController extends Controller
{
	public function index() {
		$dishCategories = DishCategory::orderBy('created_at', 'desc')->paginate(10);
		
		return view('user.dish-categories.index', compact('dishCategories'));
	}

	public function dishesFromCategory($categoryId) {
        $dishes = DishCategory::join('dishes', 'dish_categories.id', '=', 'dishes.category_id')
                          ->where('dish_categories.id', $categoryId)
                          ->select('dish_categories.*', 'dishes.*')
                          ->orderBy('dishes.created_at', 'desc')
                          ->paginate(10);
        
        return view('user.dishes.index', compact('dishes'));
    }
}
