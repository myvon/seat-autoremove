<?php

Route::get('/autoremove', [
    'as'   => 'autoremove.show',
    'uses' => 'AutoremoveController@show',
]);


Route::post('/autoremove/add', [
    'as'   => 'autoremove.add',
    'uses' => 'AutoremoveController@addCorp',
]);

Route::post('/autoremove/remove/{id}', [
   'as' => 'autoremove.remove',
   'uses' => 'AutoremoveController@remove',
]);