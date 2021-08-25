<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PdfController;

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

Route::get('/', 'HomeController@index');

Route::get('/master', function () {
    return view('layouts.master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('data', 'DataController');

Route::resource('project', 'ProjectController');

Route::resource('absent', 'AbsentController');

Route::resource('absen', 'AbsenController');

Route::resource('profile', 'ProfileController');

Route::resource('holiday', 'HolidayController');

Route::resource('profil', 'ProfilController');

Route::resource('data_user', 'DataUserController');

Route::resource('management_account', 'UserController');

Route::get('control', 'ControlController@index');

Route::post('/status/update', 'ControlController@updateStatus')->name('users.update.status');

Route::post('/past', 'DataUserController@past')->name('data.past');

Route::get('/sakit/{project}', 'AbsenController@sakit')->name('absen.sakit');
Route::get('/pastSakit/{date_in}/{time_in}/{project}', 'DataUserController@pastSakit');

Route::get('/pdf/{id}/{from}/{to}/{project}', 'PdfController@cetak');

Route::get('/cpdf/{from}/{to}/{project}', 'PdfController@user');

Route::get('/list/{list_id}', 'AbsentController@tampil');

Route::get('/list/{list_id}/{from}/{to}', 'AbsentController@range');

