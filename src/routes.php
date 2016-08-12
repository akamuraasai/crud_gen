<?php
Route::get('crud-gen/time/{timezone}',
           'AkamuraAsai\CrudGen\Controllers\CrudGenController@index');
Route::get('crud-gen/teste',
    'AkamuraAsai\CrudGen\Controllers\CrudGenController@test');