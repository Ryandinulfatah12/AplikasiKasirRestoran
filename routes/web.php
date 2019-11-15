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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth']], function() {
	Route::prefix('admin')->group(function() {
		Route::get('/', function() {
			return view('admin.pages.dashboard');
		})->name('admin.home');

		Route::prefix('user')->group(function() {
			Route::get('/', 'UserController@daftar')->name('admin.user')->middleware('level.admin');
			Route::delete('/', 'UserController@delete')->middleware('level.admin');

			Route::get('/add', 'UserController@add')->name('admin.user.add')->middleware('level.admin');
			Route::post('/add', 'UserController@save')->middleware('level.admin');

			Route::get('/edit/{id}', 'UserController@edit')->name('admin.user.edit')->middleware('level.admin');
			Route::post('/edit/{id}', 'UserController@update')->middleware('level.admin');

			Route::get('/setting','UserSettingController@form')->name('admin.user.setting');
			Route::post('/setting', 'UserSettingController@update');
		});

		Route::prefix('masakan')->group(function() {
			Route::get('/masakan', 'MasakanCOntroller@daftar')->name('admin.masakan');
		});

	});
});



Auth::routes();

Route::any('register', function() {
	return abort(404);
});