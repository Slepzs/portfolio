<?php

use App\Http\Controllers\PostController;
use App\Models\Feed;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

require __DIR__.'/auth.php';

Route::get('/register', function () {
    return Inertia::render('Register', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', function() {
    return Inertia::render('Home');
})->name('home');

Route::get('/articles', function() {
    return Inertia::render('Articles');
})->name('articles');
/*
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
*/

Route::get('/dashboard', [App\Http\Controllers\FeedController::class, 'index'])->name('dashboard');

/*
Route::get('/home', function() {
    return Inertia::render('Home');
})->name('home');
*/

Route::resource('articles', PostController::class);

Route::resource('feed', 'App\Http\Controllers\FeedController');

/*
Route::get('/', function() {
   return view('welcome');
});
*/

Route::get('/x', function() {

    $feed = Feed::with('media')->get();
    // return $wines;
    return view('welcome', compact('feed'));

});


