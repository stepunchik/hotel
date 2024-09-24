<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ConferenceServiceController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\DishCategoriesController;
use App\Http\Controllers\RoomCategoriesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\RoomsController;

use App\Http\Controllers\auth\AuthController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDishesController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminRoomsController;
use App\Http\Controllers\Admin\ReservationRequestsController;
use App\Http\Controllers\Admin\AdminDishCategoriesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\Admin\AdminRoomCategoriesController;
use App\Http\Controllers\Admin\ServicesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('news', NewsController::class)->only('show');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::resource('review', ReviewController::class)->only('create', 'store');

Route::resource('rooms', RoomsController::class)->only('index', 'show');

Route::resource('room-categories', RoomCategoriesController::class)->only('index');
Route::get('/room-categories/{categoryId}', [RoomCategoriesController::class, 'roomsFromCategory'])->name('room-categories.rooms-from-category');

Route::resource('reservations', ReservationController::class)->except('show', 'edit', 'update');
Route::get('reservations/available-rooms', [ReservationController::class, 'showAvailableRooms'])->name('reservations.available-rooms');
Route::get('reservations/room-search', [ReservationController::class, 'roomSearch'])->name('reservations.room-search');

Route::resource('dish-categories', DishCategoriesController::class)->only('index');
Route::get('/dish-categories/{categoryId}', [DishCategoriesController::class, 'dishesFromCategory'])->name('dish-categories.dishes-from-category');

Route::resource('dishes', DishesController::class)->only('index', 'show');

Route::resource('conference-service', ConferenceServiceController::class)->only('index');

Route::resource('offers', OffersController::class)->only('index');

Route::prefix('auth')->group(function () {
	Route::get('/login', function () { return view('auth.login'); });
	Route::post('/login', [AuthController::class, 'login'])->name('login');
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
	Route::get('/register', function () { return view('auth.register'); });
	Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::name('admin.')->prefix('admin')->middleware('role:admin')->group(function () {
	Route::resource('main', AdminController::class)->only('index');
	
	Route::resource('dishes', AdminDishesController::class)->except('show');
	
	Route::resource('reviews', AdminReviewController::class)->only('index', 'destroy');
	Route::post('/reviews/{review}', [AdminReviewController::class, 'approve'])->name('reviews.approve');
	
	Route::resource('news', AdminNewsController::class)->except('show');

	Route::resource('rooms', AdminRoomsController::class)->except('show');
	
	Route::resource('reservation-requests', ReservationRequestsController::class)->only('index', 'destroy');
	Route::put('/reservation-requests/{reservation}', [ReservationRequestsController::class, 'confirm'])->name('reservation-requests.confirm');
		
	Route::resource('dish-categories', AdminDishCategoriesController::class)->except('show');	
	
	Route::resource('pages', PagesController::class)->only('index', 'create', 'store');	
	
	Route::resource('photos', PhotosController::class)->except('show', 'create', 'store');
	Route::get('/photos/create/{room}', [PhotosController::class, 'create'])->name('photos.create');
	Route::post('/photos/{room}', [PhotosController::class, 'store'])->name('photos.store');

	Route::resource('room-categories', AdminRoomCategoriesController::class)->except('show');	

	Route::resource('services', ServicesController::class)->except('show');	
});








