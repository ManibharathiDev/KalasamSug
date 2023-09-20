<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\userController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\AdminController;

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
Route::get('/registerform',[AdminController::class,'registerform'])->name('register');
Route::get('/loginpage',[ApiController::class,'loginpage'])->name('loginpage');
Route::get('/addcust',[APiController::class,'addcust'])->name('addcust');
Route::post('/addcustomer',[APIController::class,'addcustomer'])->name('customer');
Route::get('/addcall',[APiController::class,'addcall'])->name('addcall');
Route::post('/callregister',[APIController::class,'callregister'])->name('callRegister');
Route::post('/updateregister',[APIController::class,'updateregister'])->name('updateregister');
Route::get('/custReport',[APiController::class,'custReport'])->name('custReport');
Route::post('/CallsReport',[APIController::class,'CallsReport'])->name('CallsReport');
Route::get('/UpdateCalls/{id}',[APIController::class,'UpdateCalls'])->name('editcalls');
Route::Post('homepage',[ApiController::class,'homepage'])->name('home');
Route::get('home',[ApiController::class,'home'])->name('home1');
Route::get('homelogout',[ApiController::class,'homelogout'])->name('logout');
// Route::group([
//     'prefix'=>'/admin',
//     'as'=>'admin.',
// ],function(){
//     Route::post('/addNewUser',[AdminController::class,'addNewUser'])->name('adduser');
//     Route::get('/registerform',[AdminController::class,'registerform'])->name('register');
//     Route::get('/loginpage',[AdminController::class,'loginpage'])->name('loginpage');
//     Route::get('/addcust',[AdminController::class,'addcust'])->name('addcust');
//     Route::post('/addcustomer',[AdminController::class,'addcustomer'])->name('customer');
//     Route::get('/addcall',[AdminController::class,'addcall'])->name('addcall');
//     Route::post('/callregister',[AdminController::class,'callregister'])->name('callRegister');
//     Route::post('/updateregister',[AdminController::class,'updateregister'])->name('updateregister');
//     Route::get('/custReport',[AdminController::class,'custReport'])->name('custReport');
//     Route::post('/CallsReport',[AdminController::class,'CallsReport'])->name('CallsReport');
//     Route::get('/UpdateCalls/{id}',[AdminController::class,'UpdateCalls'])->name('editcalls');
//     Route::Post('homepage',[AdminController::class,'homepage'])->name('home');
//     Route::get('home',[AdminController::class,'home'])->name('home1');
//     Route::get('homelogout',[AdminController::class,'homelogout'])->name('logout');
// });
