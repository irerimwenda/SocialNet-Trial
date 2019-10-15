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

/* Route::get('/hello', function () {
    return Auth::user()->hello();
}); */

Route::get('/add', function () {
    return \App\User::first()->add_friend(2);
});

Route::get('/accept', function () {
    return \App\User::find(2)->accept_friend(1);
}); 

Route::get('/friends', function () {
    return \App\User::find(4)->friends();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth Routes
Route::group(['middleware' => 'auth'], function() {

    Route::get('/profile/{slug}', [
        'uses' => 'ProfileController@index'
    ])->name('my-profile');

    Route::get('/profile/edit/profile', [
        'uses' => 'ProfileController@edit'
    ])->name('edit-profile');

    Route::post('/profile/update/profile', [
        'uses' => 'ProfileController@update'
    ])->name('update-profile'); 

});
