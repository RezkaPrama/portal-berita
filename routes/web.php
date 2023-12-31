<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontNewsController::class, 'index'])->name('front.index');
Route::post('/', [FrontNewsController::class, 'index'])->name('front.news.index');

/**
 * route for admin
 */
Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        //route Berita
        Route::resource('/news', NewsController::class, ['as' => 'admin']);

        //route Kategori
        Route::resource('/category', CategoriesController::class, ['as' => 'admin']);
    });
});
