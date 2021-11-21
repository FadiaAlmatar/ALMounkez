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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FullOrderController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [HomeController::class, 'home'])->name('home');
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
//resource
Route::resource('orders', OrderController::class);
Route::get('/printorder/{id}', [OrderController::class, 'printorder'])->name('orders.printorder');
Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);
Route::resource('messages', MessageController::class);
Route::resource('groups', GroupController::class);
Route::resource('groups', GroupController::class);
Route::resource('fullorders', FullOrderController::class);
//comment function
Route::post('/toggle-approve', [CommentController::class,'approval'])->name('approve');
//chat functions
Route::get('/chat/{id}', [MessageController::class, 'chat'])->name('messages.chat');
Route::get('/chatgroup/{id}', [MessageController::class, 'chatgroup'])->name('messages.chatgroup');
Route::get('/print/{id}', [MessageController::class, 'print'])->name('messages.print');
Route::get('/printgroup/{id}', [MessageController::class, 'printgroup'])->name('messages.printgroup');
Route::get('/get-friends', [MessageController::class, 'getfriends'])->name('friends');
Route::get('/new-subscribes/{id}', [GroupController::class, 'addsubscribes'])->name('addsubscribes');
//order function

// orders.printorder
//fullorders functions
Route::get('/fullorder/create_local', [FullOrderController::class, 'create_local'])->name('fullorders.create_local');
Route::get('/fullorder/create_external', [FullOrderController::class, 'create_external'])->name('fullorders.create_external');
Route::get('/fullorder/create_transfer', [FullOrderController::class, 'create_transfer'])->name('fullorders.create_transfer');
Route::get('/fullorder/create_replacement', [FullOrderController::class, 'create_replacement'])->name('fullorders.create_replacement');
Route::post('/fullorder/store_order/{id}', [FullOrderController::class, 'store_order'])->name('fullorders.store_order');
Route::get('/print/{id}', [FullOrderController::class, 'print'])->name('fullorders.print');

Route::get('/dashboard', function () {
    // return view('pages.home');
       return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('create-pdf-file', [PDFController::class, 'index']);
