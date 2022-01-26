<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [HomePageController::class,"index"])->name('home');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function (){

    Route::get('/contacts/list', [ContactController::class,"list"])->name('contacts.list');
    Route::get('/contacts', [ContactController::class,"create"])->name('contacts.create');
    Route::post('/contacts', [ContactController::class,"store"])->name('contacts.store');
    Route::get('/contacts/{contacts}', [ContactController::class,"edit"])->name('contacts.edit');
    Route::put("/contacts/{contacts}", [ContactController::class,"update"])->name('contacts.update');
    Route::delete('/contacts/{contacts}', [ContactController::class,"destroy"])->name('contacts.destroy');


});
