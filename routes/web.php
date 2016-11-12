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
Route::get('/invitation/send/{invitedUser}', 'InvitationController@sendInvitation')->name('send_invitation');
Route::get('/invitation/look', 'InvitationController@lookForInvitation');
Route::get('/invitation/decline', 'InvitationController@decline');
Route::get('/invitation/accept', 'InvitationController@accept');
Route::get('/invitation/cancel', 'InvitationController@cancel');
Route::get('/invitation/response', 'InvitationController@lookForResponse');

Route::get('/game/{id}', 'GameController@index');
Route::get('/game/move/{id}/{button}', 'GameController@move');

Route::post('/test', 'HomeController@test');
