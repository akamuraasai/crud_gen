<?php

Route::group(['prefix' => '/crud-gen'], function () {
    Route::get('/',
        'AkamuraAsai\CrudGen\Controllers\CrudGenController@index');
    Route::post('/',
        'AkamuraAsai\CrudGen\Controllers\CrudGenController@createCrud');
});

Route::get('crud-gen/teste',
    'AkamuraAsai\CrudGen\Controllers\CrudGenController@test');