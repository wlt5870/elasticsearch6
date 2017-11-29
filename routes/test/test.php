<?php
Route::group(['prefix' => 'test', 'namespace' => 'Admin'],function(){
    Route::get('/','ArticleController@index');
    Route::get('algolia','ArticleController@algolia');
});