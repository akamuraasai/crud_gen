<?php
Route::get('crud-gen/',
           'AkamuraAsai\CrudGen\Controllers\CrudGenController@index');
Route::get('crud-gen/teste',
    'AkamuraAsai\CrudGen\Controllers\CrudGenController@test');