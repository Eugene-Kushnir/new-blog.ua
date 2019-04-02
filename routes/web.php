<?php

Route::group([
	'prefix'=>'admin',
	'namespace'=>'Admin',
	'middleware'=>['auth']
	],
	function (){
		Route::get('/', 'DashboardController@dashboard')
			->name('admin.index');
		Route::resource('/category', 'CategoryController', ['as'=>'admin']);
		Route::resource('/article', 'ArticleController', ['as'=>'admin']);
	});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
