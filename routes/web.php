<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\inReviewController;
use App\Http\Controllers\inclusiveHumanController;
use App\Http\Controllers\reportController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-year-in-review', [inReviewController::class, 'index'])->name('inReview');
Route::get('/inclusive-human-development', [inclusiveHumanController::class, 'index'])->name('inclusiveHuman');
Route::get('/inclusive-human-development/{id}/reports', [reportController::class, 'index'])->name('report');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', '\App\Http\Controllers\Admin\DashboardController');
    Route::resource('/pages', '\App\Http\Controllers\Admin\PagesController');
    Route::resource('/story', '\App\Http\Controllers\Admin\StoryController');
    Route::resource('/storyUp', '\App\Http\Controllers\Admin\StoryUpController');
    Route::resource('/content', '\App\Http\Controllers\Admin\ContentController');
    Route::resource('/infografis', '\App\Http\Controllers\Admin\InfografisController');
    Route::resource('/report', '\App\Http\Controllers\Admin\ReportController');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
