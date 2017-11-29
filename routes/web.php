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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mail', 'HomeController@mail')->name('mail');
Route::get('/cache1', 'HomeController@cache1')->name('cache1');
Route::get('/cache2', 'HomeController@cache2')->name('cache2');
Route::get('/geterror', 'HomeController@getError')->name('getError');
Route::get('/queueSend', 'HomeController@queueSend')->name('queueSend');
Route::any('/upload', 'HomeController@upload')->name('upload');
Route::get('/qrcode', 'HomeController@qrcode')->middleware('custom');;
Route::get('/command',function(){
    return 'ok';
    //Artisan::call('command:JobCommand',['parameter'=>1]);
});
Route::get('sharedLock','HomeController@sharedLock');
Route::get('updateLock','HomeController@updateForLock');
Route::get('excel','HomeController@excel');
