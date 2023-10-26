<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
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
    return view('layouts.app');
});



Route::get('/register', function(){
    return view('layouts.home');
})->name('register');


Route::get('/registration-failed', [RegisterController::class, 'registrationFailed'])->name('auth.failed');
 

Route::get('/register/email', function(){ 
    return view('layouts.email');
})->name('register.email');
Route::post('/register/email', [RegisterController::class, 'showEmailForm']);

Route::get('/register/name', function(){ 
    return view('auth.name');
})->name('register.name');
Route::post('/register/name', [RegisterController::class, 'showNameForm']);

Route::get('/register/birthday' , function(){ 
    return view('auth.birthday');
})->name('register.birthday');
Route::post('/register/birthday', [RegisterController::class, 'store']);


Route::get('/register/password' , function(){ 
    return view('auth.password');
})->name('register.password');
Route::post('/register/password', [RegisterController::class, 'register']);


Route::get('/register/gender' , function(){ 
    return view('auth.gender');
})->name('register.gender');
Route::post('/register/gender', [RegisterController::class, 'gender']);


Route::get('/register/telephone' , function(){ 
    return view('auth.telephone');
})->name('register.telephone');
Route::post('/register/telephone', [RegisterController::class, 'telephone']);


Route::get('/register/loggedout',function(){
    return view('auth.loggedout');
})->name('loggedout');

Route::get('/auth',function(){
    return view('auth.auth');
})->name('login');

Route::post('/auth', [RegisterController::class, 'login']);


Route::get('/home',function(){
    return view('auth.home');
})->name('home');

 Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');