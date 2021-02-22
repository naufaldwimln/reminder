<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\LoginController@login');

Route::group(['middleware' => 'auth:api'], function() {

    Route::apiResources([
        'notification' => 'API\TransaksiController'
    ]);

    Route::post('update-token', 'API\NotificationController@updateToken')->name('update.token');


});

Route::post('send-message', 'API\NotificationController@checkingNotification')->name('send.message');
Route::post('send-message-jos', 'API\NotificationController@testingPost')->name('send.message.jos');
