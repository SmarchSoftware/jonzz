<?php
Route::group( [
	'middleware'=> config('jonzz.route.middleware'),
	'prefix'	=> config('jonzz.route.prefix'),
	'as'		=> config('jonzz.route.as') ], function () {
		Route::resource('jonzz', 'Smarch\Jonzz\Controllers\JonzzController',
			['names' => [
	    		'create'	=> 'create',
	    		'destroy'	=> 'destroy',
	    		'edit'		=> 'edit',
	    		'index'		=> 'index',
	    		'show'		=> 'show',
	    		'store'		=> 'store',
	    		'update'	=> 'update'
				]
			]
		);
		Route::get('lex/orderby/{field}', 'Smarch\Lex\Controllers\CurrencyController@index')->name('orderby');
		Route::get('lex/{lex}/cumulative', 'Smarch\Lex\Controllers\CurrencyController@showCumulative')->name('cumulative');
		Route::post('lex/{lex}/cumulative', 'Smarch\Lex\Controllers\CurrencyController@updateCumulative')->name('cumulative');
	}
);