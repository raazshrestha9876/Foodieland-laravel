<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\AccountController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/",[UserController::class, 'index']);

Route::get('/viewFoods',[UserController::class,'viewFoods']);

Route::get('/search-food',[FoodController::class,'search']);

Route::get('/viewSingleFood/{id}',[UserController::class, 'viewSingleFood']);

Route::get('/view-category/{slug}',[UserController::class,'viewCategory']);




Route::get('/checkout', [UserController::class,'checkout']);
Route::get('/orderCheckOut/user',[UserController::class,'orderCheckout']);

Route::post('/place-order', [CheckoutController::class,'placeOrder']);
Route::get('/pay-with-khalti/{price}/{order_id}', [CheckoutController::class,'payWithKhalti']);
Route::get('/update-order/{id}',[CheckoutController::class,'updateOrder']);






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [AdminController::class, 'index']);

Route::get('/categories', [AdminController::class, 'categories']);


Route::post('/add-to-category',[CategoryController::class, 'store']);
Route::get('/edit-category/{id}',[CategoryController::class,'edit']);
Route::post('/update-category/{id}',[CategoryController::class,'update']);
Route::get('/delete-category/{id}',[CategoryController::class,'destroy']);

Route::get('/foods', [AdminController::class,'foods']);
Route::get('/foods-search', [FoodController::class,'index']);
Route::post('/add-food',[FoodController::class,'store']);
Route::get('/edit-food/{id}',[FoodController::class,'edit']);
Route::post('/update-food/{id}',[FoodController::class,'update']);
Route::get('/delete-food/{id}',[FoodController::class,'destroy']);


Route::get('/addToCart',[UserController::class,'cart']);
Route::post('/add-to-cart/{id}',[CartController::class,'addToCart']);
Route::get('/delete-cart/{id}',[CartController::class,'destroy']);


Route::get('/addToWishlist',[UserController::class,'wishlist']);
Route::get('/add-to-wishlist/{id}',[WishlistController::class,'addToWishlist']);
Route::get('/delete-wishlist/{id}',[WishlistController::class,'destroy']);


Route::get('/orders',[OrderController::class,'index']);
Route::get('/view-order/{id}',[OrderController::class,'updateOrderView']);
Route::post('/change-order-details/{id}',[OrderController::class,'changeOrderDetails']);
Route::get('/cancel-order/{id}', [OrderController::class,'cancelOrder']);



Route::get('/orderList',[userController::class,'orderlist']);

Route::get('/food-sort', [FoodController::class, 'sort']);

// Route::get('/view-tracking/{id}',[OrderController::class,'viewTracking']);
// Route::get('/tracking-order',[TrackController::class,'index']);
// Route::post('/track-order', [TrackController::class, 'track']);


// Route::namespace('admin')->prefix('admin')->group(function () {
//     Route::get('orders', [OrderController::class, 'countTodayOrders'])->name('admin.orders.index');
// });














