<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;

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
Route::post('/addNewUser',[APIController::class,'addNewUser'])->name('adduser');
Route::get('/registerform',[APIController::class,'registerform'])->name('register');
Route::get('/loginpage',[ApiController::class,'loginpage'])->name('loginpage');
Route::post('/login',[ApiController::class,'login'])->name('login');
Route::get('/addcust',[APiController::class,'addcust'])->name('addcust');
Route::post('/addcustomer',[APIController::class,'addcustomer'])->name('customer');
Route::get('/addcall',[APiController::class,'addcall'])->name('addcall');
Route::post('/callregister',[APIController::class,'callregister'])->name('callRegister');
Route::get('/custReport',[APiController::class,'custReport'])->name('custReport');
Route::post('/CallsReport',[APIController::class,'CallsReport'])->name('CallsReport');
Route::get('/UpdateCalls/{id}',[APIController::class,'UpdateCalls'])->name('editcalls');
Route::post('login',[ApiController::class,'login'])->name('login');
