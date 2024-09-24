<?php

namespace App\Http\Controllers;

use App\Models\Dish;

use Illuminate\Http\Request;

class DishesController extends Controller
{
    public function index() {
        $dishes = Dish::orderBy('created_at', 'desc')->paginate(10);
        
        return view('user.dishes.index', compact('dishes'));
    }

    public function show(Dish $dish) {
        return view('user.dishes.show', compact('dish'));
    }
}
