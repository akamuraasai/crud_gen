<?php
Route::group(['prefix' => '##moduloPagina*##', 'middleware' => ['auth','SuiteSessao']], function () {
    /**
     *--------------------------------------------------------------------------
     * Rotas de ##nomePagina##
     *--------------------------------------------------------------------------
     */
    Route::group(['prefix' => '##nomePagina*##', 'middleware' => ['auth','Perfil:##itemPermissaoPagina##.menu']], function () {
        Route::get('/', '##moduloPagina##\##nomePagina##Controller@getIndex')->name('##nomePagina*##');
        Route::post('/', '##moduloPagina##\##nomePagina##Controller@post');
        Route::get('/lista', '##moduloPagina##\##nomePagina##Controller@lista');
        Route::get('/data/{id}', '##moduloPagina##\##nomePagina##Controller@getDados');
        Route::delete('/deletar', '##moduloPagina##\##nomePagina##Controller@deletar');
    });
});
