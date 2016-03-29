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
		Route::get('jonzz/orderby/{field}', 'Smarch\Jonzz\Controllers\JonzzController@index')->name('orderby');
		Route::get('jonzz/{jonzz}/cumulative', 'Smarch\Jonzz\Controllers\JonzzController@showCumulative')->name('cumulative');
		Route::post('jonzz/{jonzz}/cumulative', 'Smarch\Jonzz\Controllers\JonzzController@updateCumulative')->name('cumulative');
	}
);