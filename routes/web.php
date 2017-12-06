<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', ['as' => 'index', 'uses' => 'IndexController@main' ]);
 

// Route::resource('/home', 'UserController');

/* HOME URL */
Route::get('/home', ['as' => 'home.dashboard', 'uses' => 'HomeController@dashboard' ]);
Route::put('/home', ['as' => 'home.dashboardUpdate', 'uses' => 'HomeController@dashboardUpdate' ]);

Route::get('/home/travel', ['as' => 'home.travels', 'uses' => 'HomeController@travel' ]);

Route::get('/home/account', ['as' => 'home.account', 'uses' => 'HomeController@account' ]);
Route::delete('/home/account', ['as' => 'home.accountDelete', 'uses' => 'HomeController@accountDelete' ]);

Route::get('/home/car', ['as' => 'home.car', 'uses' => 'HomeController@car' ]);
Route::put('/home/car', ['as' => 'home.carUpdate', 'uses' => 'HomeController@carUpdate' ]);


Route::get('search', ['as' => 'search', 'uses' => 'Search@index' ]);
Route::get('getTravels', ['as' => 'search.getTravels', 'uses' => 'Search@getTravels' ]);

Auth::routes();


