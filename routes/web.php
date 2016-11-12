<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/game/{id}', 'GameController@index');
Route::get('/invitation/send/{invitedUser}', 'InvitationController@sendInvitation');
Route::get('/invitation/look', 'InvitationController@lookForInvitation');
Route::get('/invitation/decline', 'InvitationController@decline');
Route::get('/invitation/accept', 'InvitationController@accept');

Route::post('/test', 'HomeController@test');
