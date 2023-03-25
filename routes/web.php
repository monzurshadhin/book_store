<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[ShopController::class,'index'])->name('home');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
//admin
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/add-book',[AdminController::class,'addBook'])->name('add.book');
    Route::post('/add-book',[BookController::class,'addBook'])->name('add.book');
    Route::get('/books',[BookController::class,'allBooks'])->name('books');
    Route::post('/delete-books',[BookController::class,'deleteBooks'])->name('delete.books');
    Route::get('/edit-book/{book_id}',[BookController::class,'editBook'])->name('edit.book');
    Route::post('/update-book',[BookController::class,'updateBook'])->name('update.book');

    Route::get('/manage-book',[AdminController::class,'manageBook'])->name('manage.book');
    Route::get('/make-admin',[AdminController::class,'makeAdmin'])->name('make.admin');
    Route::get('/manage-order',[AdminController::class,'manageOrder'])->name('manage.order');
    Route::get('/update-adminOrder/{order_id}',[OrderController::class,'updateAdminOrder'])->name('update.adminOrder');
    Route::post('/delete-adminOrder',[OrderController::class,'deleteAdminOrder'])->name('delete.adminOrder');
    Route::get('/update-admin/{user_id}',[AdminController::class,'updateAdmin'])->name('update.admin');
    Route::post('/delete-admin',[AdminController::class,'deleteAdmin'])->name('delete.admin');





//    user
    Route::get('/manage-userOrder',[UserController::class,'manageUserOrder'])->name('manage.userOrder');
    Route::get('/edit-userOrder/{order_id}',[OrderController::class,'editUserOrder'])->name('edit.userOrder');
    Route::post('/update-order',[OrderController::class,'updateOrder'])->name('update.order');
    Route::post('/delete-userOrder',[OrderController::class,'deleteOrder'])->name('delete.userOrder');
    Route::get('/book/{book_id}',[BookController::class,'bookDetails'])->name('book.details');
    Route::post('/order-book',[OrderController::class,'orderBook'])->name('order.book');

//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
});
