<?php

/*
|--------------------------------------------------------------------------
| @author Fabiano Gomes <fabianojgaraujo@gmail.com>
| Rodas para o projeto
|--------------------------------------------------------------------------
*/

Route::get('/produtos', 'ProdutosController@index' ) ;

Route::get('/produtos/criar', 'ProdutosController@create' )
	->name('frm_novo_produto') ;

Route::post('/produtos/save', 'ProdutosController@store' ) ;

Route::post('/produtos/criar/{id_produtos}', 'ProdutosController@create' ) ;

Route::delete('/produtos/remover/{id_produtos}', 'ProdutosController@destroy' ) ;

Route::group(array('prefix' => 'api'), function()
{

	Route::resource('tipo-produtos', 'TipoProdutosController');

});