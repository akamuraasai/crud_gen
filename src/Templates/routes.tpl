<?php
Route::group(['prefix' => '##paiBread##', 'middleware' => ['auth','SuiteSessao']], function () {
/**
 *--------------------------------------------------------------------------
 * Rotas de ##nomePagina##
 *--------------------------------------------------------------------------
 */
Route::group(['prefix' => '##nomePagina*##', 'middleware' => 'auth'], function () {
   Route::get('/', 'Sistema\##nomePagina##Controller@getIndex')->name('##nomePagina*##');
   Route::post('/', 'Sistema\##nomePagina##Controller@post');
   Route::get('/lista', 'Sistema\##nomePagina##Controller@lista');
   Route::get('/data/{id}', 'Sistema\##nomePagina##Controller@getDados');
   Route::delete('/deletar', 'Sistema\##nomePagina##Controller@deletar');
});

});
