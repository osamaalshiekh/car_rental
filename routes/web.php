<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});
//*************** HOMECONTROLLER routes **********
Route::get('/',[HomeController::class,'index'])->name('home');

Route::middleware(['auth', \App\Http\Middleware\CheckAdmin::class . ':admin,moderator'])->group(function () {

Route::prefix( 'admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class,'index'])->name('index');



//*************** admin CategoryController routes **********
    Route::prefix( '/category')->name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('/', action:'index')->name( name: 'index');
        Route::get('/create', action:'create')->name( name: 'create');
        Route::Post('/store', action:'store')->name( name: 'store');
        Route::get('/edit/{id}', action:'edit')->name( name: 'edit');
        Route::post('/update/{id}', action:'update')->name( name: 'update');
        Route::get('/destroy/{id}', action:'destroy')->name( name: 'destroy');
        Route::get('/show/{id}', action:'show')->name( name: 'show');
    });
    //*************** admin CarController routes **********

    Route::prefix( '/car')->name('car.')->controller(CarController::class)->group(function () {
        Route::get('/', action:'index')->name( name: 'index');
        Route::get('/create', action:'create')->name( name: 'create');
        Route::Post('/store', action:'store')->name( name: 'store');
        Route::get('/edit/{id}', action:'edit')->name( name: 'edit');
        Route::post('/update/{id}', action:'update')->name( name: 'update');
        Route::get('/destroy/{id}', action:'destroy')->name( name: 'destroy');
        Route::get('/show/{id}', action:'show')->name( name: 'show');
    });


    //*************** admin ReservationController routes **********
    Route::prefix('reservation')->name('reservation.')->controller(ReservationController::class)->group(function () {
        Route::get('/','index')->name('index');
        Route::get('/approve/{id}','show')->name('approve');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/show/{id}','show')->name('show');
        Route::get('/destroy/{id}','destroy')->name('destroy');

    });
});
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
