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

Route::get('activate/{token}', 'Auth\RegisterController@activate')
    ->name('activate');



Route::resource('animals','AnimalsController');
//Route::resource('/user','AnimalsController');
Route::resource('adoptions','AdoptionController');







Auth::routes();


//Restrict access for user sites
Route::group(['middleware' => ['auth','user']], function() {
    Route::resource('/user','AnimalsController');
    Route::get('/userAdoptions','AdoptionController@userAdoptions');
    Route::post('/adopt','AnimalsController@adopt');

});
//Route::get('/staff','AdoptionController@index')->name('staff');

//Restrict access for admin 
Route::group(['middleware' => ['auth','staff']], function() {
    Route::get('/staff','AdoptionController@index')->name('staff');
    Route::get('/staffAllAdoptions','AdoptionController@allAdoptions');
    Route::post('/added','AnimalsController@store');
    Route::get('/staffAllAnimals','AnimalsController@viewAllAnimals');
    Route::post('/AdoptionAccept','AnimalsController@AdoptionAccept');
    Route::post('/AdoptionReject','AnimalsController@AdoptionReject');
    Route::get('/staffAdd','AnimalsController@create');
    Route::post('/addAnimal', 'AnimalsController@store');
});


