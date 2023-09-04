<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/scheduler', function(){
    Artisan::call('schedule:run');
});

Route::get('/', function () {
    return view('welcome');
});

//Route for to dashbord for both Admins and Students (ps: IF statement is at DashboardController)
Route::get('/dashboard', 'App\Http\Controllers\AuthRouteController@index', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/main', function () {
    return view('main');
})->name('main');



Route::resource('/candidates', '\App\Http\Controllers\CandidatesController');
Route::resource('/students', '\App\Http\Controllers\StudentsController');
Route::resource('/voting', '\App\Http\Controllers\VotingController');
Route::resource('/verify', '\App\Http\Controllers\VerifyController');
Route::resource('/status', '\App\Http\Controllers\StatusController');
Route::resource('/analytics', '\App\Http\Controllers\AnalyticsController');
Route::resource('/regenerate', '\App\Http\Controllers\RegenerateController');
Route::resource('/check', '\App\Http\Controllers\CheckController');
Route::resource('/time', '\App\Http\Controllers\TimeController');

Route::resource('/admin', '\App\Http\Controllers\AdminController');





require __DIR__.'/auth.php';
