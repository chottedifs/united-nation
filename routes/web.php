<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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
    return view('pages.home');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', '\App\Http\Controllers\Admin\DashboardController');
    Route::resource('/pages', '\App\Http\Controllers\Admin\PagesController');
    Route::resource('/story', '\App\Http\Controllers\Admin\StoryController');
    Route::resource('/content', '\App\Http\Controllers\Admin\ContentController');
    Route::resource('/infografis', '\App\Http\Controllers\Admin\InfografisController');
    Route::resource('/report', '\App\Http\Controllers\Admin\ReportController');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
