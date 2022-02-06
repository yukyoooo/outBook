<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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
// BookApp
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/show/{id}', [HomeController::class, 'show'])->name('home.show');
Route::middleware(['auth'])->group(function(){
    Route::get('/create', [HomeController::class, 'create'])->name('home.create');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('home.edit');
    Route::post('/update/{id}', [HomeController::class, 'update'])->name('home.update');
    Route::post('/destroy/{id}', [HomeController::class, 'destroy'])->name('home.destroy');
    Route::post('/store', [HomeController::class, 'store'])->name('home.store');
    Route::get('/selectBook', [HomeController::class, 'selectBook'])->name('home.selectBook');
});



//
//
//
//Route::get('/book_list', [BookListController::class, 'index_book_list'])->name('slide.book_list');
//Route::middleware(['auth'])->group(function () {
//});
//
//Route::get('/todolist', [TodoListController::class, 'todolist'])->name('slide.todolist');
//
//Route::post('comment', [CommentsController::class, 'store'])->name('comment.store');
//Route::get('members', [UserController::class, 'members'])->name('user.user');
//Route::get('members/{id}', [UserController::class, 'show'])->name('user.show');
//Route::middleware(['auth'])->prefix('my_page')->group(function () {
//    Route::get('/', [UserController::class, 'index'])->name('user.index');
//    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
//    Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
//});
