<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


/**
route for user
**/
Route::get('/main', 'HomeController@main');
Route::post('/find', 'HomeController@findKos');
Route::post('/api/wp', 'HomeController@doWeightProduct');
Route::get('show/{id}', 'HomeController@show');

/**
route for admin
**/

Route::get('login', function()
{
	if(Auth::check())
	{
		$list_kos = Kos::all();
		return Redirect::to('admin')->with('list_kos', $list_kos);
	}
	else 
	{
		return View::make('login');
	}
});

Route::post('login', 'HomeController@login');
Route::get('admin', 'HomeController@admin');

Route::get('tambah' , 'HomeController@tambah');
Route::post('simpan', 'HomeController@simpan');

Route::get('edit/{id}','HomeController@edit')->where('id','[0-9]+');
Route::post('update/{id}','HomeController@update');

Route::get('delete/{id}', 'HomeController@delete');

Route::get('logout', 'HomeController@logout');

Route::get('tentang', function()
{
	return View::make('tentang');
});


