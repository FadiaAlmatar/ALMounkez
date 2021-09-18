<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\GroupController;

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
Route::get('/locale/ar', function (){
    Session::put('locale', 'ar');
    App::setLocale('ar');
    return redirect()->back();
});
Route::get('/locale/en', function (){
    Session::put('locale', 'en');
    App::setLocale('en');
    return redirect()->back();
});

Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('messages', MessageController::class);
Route::resource('groups', GroupController::class);
Route::get('/chat/{id}', [MessageController::class, 'chat'])->name('messages.chat');
Route::get('/chatgroup/{id}', [MessageController::class, 'chatgroup'])->name('messages.chatgroup');
Route::get('/print/{id}', [MessageController::class, 'print'])->name('messages.print');
Route::post('/toggle-approve', [CommentController::class,'approval'])->name('approve');
Route::get('/get-friends', [MessageController::class, 'getfriends'])->name('friends');
Route::get('/new-subscribes/{id}', [GroupController::class, 'addsubscribes'])->name('addsubscribes');



Route::get('/dashboard', function () {
    return view('pages.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('create-pdf-file', [PDFController::class, 'index']);
