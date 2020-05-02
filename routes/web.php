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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('devs', 'DevController');

Route::resource('projects', 'ProjectController');

Route::get('ProjectImg/delete/{img}' , 'ProjectImgController@DeleteImage')->name('delete_image');
Route::POST('ProjectImg/edit/{project}' , 'ProjectImgController@addimages')->name('addimages');
Route::delete('ProjectImg/deleteAll' ,'ProjectImgController@DeleteAllImages')->name('delete_all');





Route::get('/locale/en' , 'LocaleController@en');
Route::get('/locale/ar' , 'LocaleController@ar');
Route::get('/test' , 'LocaleController@email')->name('mail');






// Route::get('Posts' , 'PostController@index')->name('all_posts');
// Route::post('Posts' , 'PostController@store')->name('store_post');
// Route::post('Posts/update/{post}' , 'PostController@update')->name('update_post');
// Route::get('Posts/delete/{post}' , 'PostController@destroy')->name('delete_post');