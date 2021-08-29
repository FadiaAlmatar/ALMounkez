<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\DB;
// use DB;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('messages', MessageController::class);
Route::get('/chat/{id}', [MessageController::class, 'chat'])->name('messages.chat');
// Route::get('/posts/{id}', [PostController::class, 'chat'])->name('messages.chat');
Route::post('/toggle-approve', [CommentController::class,'approval'])->name('approve');

Route::get('/get-friends', [MessageController::class, 'getfriends'])->name('friends');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
