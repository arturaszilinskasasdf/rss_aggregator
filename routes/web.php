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

// Authentication Routes
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'PageController@index');
Route::get('/test','PageController@test');

//GET	/photo	index	photo.index
//GET	/photo/create	create	photo.create
//POST	/photo	store	photo.store
//GET	/photo/{photo}	show	photo.show
//GET	/photo/{photo}/edit	edit	photo.edit
//PUT/PATCH	/photo/{photo}	update	photo.update
//DELETE	/photo/{photo}	destroy	photo.destroy

Route::get('rss/categories', 'RssCategoriesController@index');

Route::get('rss/feed_items', 'RssFeedItemsController@index');
Route::get('rss/feed_items/{feed_item}', 'RssFeedItemsController@show');

