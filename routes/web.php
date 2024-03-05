<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\InsuranceController;

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
Route::get('/blog',[HomeController::class,'blog'])->name('blog');

Route::get ('/mail',[HomeController::class,'mail'])->name('mail');;
Route::post ('/mail',[ContactController::class,'send'])->name('send');


Route::get('/detail/{pid}',[HomeController::class,'detail'])->name('detail');
Route::get('/search',[HomeController::class,'search'])->name('search');

// User panel route
Route::get('/user/panel', [UserController::class, 'userPanel'])->name('user.panel');

// Update email route
Route::post('/user/update-email', [UserController::class, 'updateEmail'])->name('user.update.email');

// Update password route
Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update.password');





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

    Route::prefix( '/blog')->name('blog.')->controller(BlogController::class)->group(function() {
        Route::get('/', action:'index')->name( name: 'index');
        Route::get('/create', action:'create')->name( name: 'create');
        Route::Post('/store', action:'store')->name( name: 'store');
        Route::get('/edit/{id}', action:'edit')->name( name: 'edit');
        Route::post('/update/{id}', action:'update')->name( name: 'update');
        Route::get('/destroy/{id}', action:'destroy')->name( name: 'destroy');
        Route::get('/show/{id}', action:'show')->name( name: 'show');
    });

    Route::prefix( '/invoice')->name('invoice.')->controller(InvoiceController::class)->group(function() {
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


    //*************** admin ReservationController routes **********
    Route::prefix('setting')->name('setting.')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update/{id}', 'update')->name('update');
    });

    //***************admin MessageController routes************
    Route::prefix('message')->name('message.')->controller(ContactController::class)->group(function () {
        Route::get('/',  'index')->name('index');

    });

    //*****************admin InsuranceController routes**************
    Route::prefix( '/insurance')->name('insurance.')->controller(InsuranceController::class)->group(function() {
        Route::get('/', action:'index')->name( name: 'index');
        Route::get('/create', action:'create')->name( name: 'create');
        Route::Post('/store', action:'store')->name( name: 'store');
        Route::get('/edit/{id}', action:'edit')->name( name: 'edit');
        Route::post('/update/{id}', action:'update')->name( name: 'update');
        Route::get('/destroy/{id}', action:'destroy')->name( name: 'destroy');
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
