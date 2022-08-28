<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\inReviewController;
use App\Http\Controllers\inclusiveHumanController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\economicTransformationController;
use App\Http\Controllers\greenDevelopmentController;
use App\Http\Controllers\innovationAccelerateController;
use App\Http\Controllers\unReformsController;

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
Route::get('/economic-transformation', [economicTransformationController::class, 'index'])->name('economicTransformation');
Route::get('/green-development-and-natural-disasters', [greenDevelopmentController::class, 'index'])->name('greenDevelopment');
Route::get('/innovation-to-accelerate-progress-towards', [innovationAccelerateController::class, 'index'])->name('innovationAccelerate');
Route::get('/un-reforms-in-indonesia', [unReformsController::class, 'index'])->name('unReforms');
Route::get('/reports/{id}', [reportController::class, 'index'])->name('report');


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
