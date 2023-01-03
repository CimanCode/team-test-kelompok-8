<?php

use App\Http\Controllers\{ admincontroller, manageadmincontroller, authcontroller, LandingController };
use Illuminate\Support\Facades\Route;

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
})->name('welcome');


Route::any('/login', [admincontroller::class, 'login'])->name('admin.login')->middleware(['NoAuth']);
Route::any('/logout', [admincontroller::class, 'logout'])->name('admin.logout')->middleware(['WithAuth']);

Route::prefix('form')
    ->name('form.')
    ->controller(LandingController::class)
    ->group(function(){
        Route::get('/aspirasi', 'aspirasi')->name('aspirasi');
        Route::post('/store', 'store')->name('store');
    });

Route::prefix('admin')
    ->name('admin.')
    ->controller(admincontroller::class)
    ->group(function() {
        Route::get('/dashboard', 'index')->name('list')->middleware(['WithAuth']);
        Route::get('/{aspirasi}', 'show')->name('detail')->middleware(['WithAuth']);
});

Route::prefix('Admin')->group(function() {
    Route::get('/', [admincontroller::class, 'list'])->name('admin.listadmin')->middleware(['WithAuth']);
    Route::get('/store', [admincontroller::class, 'store'])->name('admin.storeadmin')->middleware(['WithAuth']);
    Route::get('/showUpdate/{id}', [admincontroller::class, 'showupdate'])->name('admin.showupdate')->middleware(['WithAuth']);
    Route::post('/createadmin', [admincontroller::class, 'create'])->name('admin.createadmin')->middleware(['WithAuth']);
    Route::post('/update/{id}', [admincontroller::class, 'update'])->name('admin.updateadmin')->middleware(['WithAuth']);
    Route::get('/delete/{id}', [admincontroller::class, 'delete'])->name('admin.deleteadmin')->middleware(['WithAuth']);
});
