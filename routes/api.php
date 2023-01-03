<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ AspirasiController };
 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('Aspirasi')
    ->name('aspirasi.')
    ->controller(AspirasiController::class)
    ->group(function(){
        Route::get('/', 'index')->name('list');
        Route::get('/{aspirasi}', 'show')->name('show');
        
        Route::post('/', 'store')->name('store');
        Route::post('/update/{aspirasi}', 'update')->name('update');
    });
