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

Route::get('chat', 'ChatController@chat');

Route::post('send', 'ChatController@send');
Route::get('/send/get', 'ChatController@sendget');

Auth::routes();

Route::resource('homework', 'HomeworkController');
Route::resource('homeworksol', 'HomeworkSolutionController');
Route::post('homeworksol/myupdate', 'HomeworkSolutionController@myupdate');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings/{id}', 'HomeController@AccountSettings');
Route::get('/profile/{id}', 'HomeController@Profile');
Route::post('/updateAdmin', 'HomeController@updateAdmin');
Route::get('/getUsers', 'HomeController@getUsers');
Route::get('/getMessages', 'ChatController@getMessages');
Route::get('/getCurrentUser', 'HomeController@getCurrentUser');


