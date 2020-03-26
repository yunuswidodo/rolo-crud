<?php

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
});
Route::get('/home', function () {
    return view('home');
});

//auth login
Route::post('/postlogin', 'AuthController@postlogin');

Route::get('/login', 'AuthController@login')->name('login'); // cek di app->http->Midldleware->Authenticate

//route logout
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboards', 'DashboardController@index');

    Route::get('/siswa', 'SiswaController@index');  // make controller
    // route create tambah data
    Route::post('/siswa/create', 'SiswaController@create'); //input data
    //route edit(dari menampilkan data yang dari index)
    Route::get('/siswa/{id}/edit', 'SiswaController@edit'); // {id} mengambil id yang akan diedit . menyesuaikan dengan yang diindex
    //route update(setelah data diedit)
    Route::Post('/siswa/{id}/update', 'SiswaController@update');
    //route delete
    Route::get('/siswa/{id}/delete', 'SiswaController@delete');
    //route profile
    Route::get('/siswa/{id}/profile', 'SiswaController@profile');
});

//Route::get('/dashboards', 'DashboardController@index')->middleware('auth');  jika ingin menerapkan middleware sendiri
