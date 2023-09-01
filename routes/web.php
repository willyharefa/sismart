<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HotProspectController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TypeActionController;
use App\Http\Controllers\TypeCustomerController;
use App\Http\Controllers\TypeServiceController;
use App\Http\Controllers\UserController;
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

// Route::get('/dashboard', function() {
//     return view('layouts.dashboard')->name('index');
// });

Route::get('/', [Controller::class, 'index'])->name('index');

// Route::get('/customers', function() {
//     return view('pages.customers.indexCustomers')->name('indexCustomers');
// });

Route::resource('konsumens', KonsumenController::class);
Route::resource('ticket', TicketController::class);
Route::resource('prospect', ProspectController::class);
Route::resource('type-action', TypeActionController::class);
Route::resource('type-service', TypeServiceController::class);
Route::resource('type-customer', TypeCustomerController::class);
Route::resource('hot-prospect', HotProspectController::class);
Route::resource('user', UserController::class);


// Route::view('/type-action','pages.custom.typeAction.indexTypeAction', ['title' => 'Type Action']);
