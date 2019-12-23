<?php

Auth::routes();

Route::any('register', function() {
	return abort(404);
});

// view laman frontend
Route::get('/','FrontEndController@index');
//tampilkan menu masakan (database)
Route::get('/', 'FrontEndController@menu')->name('menu-masakan');

//menambahkan item ke cart menggunakan session
Route::get('/cart/{id}','FrontEndController@AddToCart')->name('add.cart');

//fungsi menambah,menghapus item session yang ada pada cart
Route::get('/add{id}', 'FrontEndController@getAddOne')->name('addone');
Route::get('/reduce{id}', 'FrontEndController@getReduceByOne')->name('reducebyone');
Route::get('/remove{id}', 'FrontEndController@getRemoveItem')->name('remove.items');

//view cart
Route::get('/shopping-cart','FrontEndController@getCart')->name('shopping.cart');
//kirim data cart ke tabel order
Route::post('/shopping-cart', 'FrontEndController@postCart')->name('postcart');

//view checkout untuk verifikasi tagihan
Route::get('/checkout','FrontEndController@getCheckout')->name('checkout');
//kirim data ke tabel detail order
Route::post('/checkout', 'FrontEndController@postCheckout')->name('postcheckout');

Route::group(['middleware'=>['auth']], function() {
	Route::prefix('admin')->group(function() {
		Route::get('/', function() {
			return view('admin.pages.dashboard');
		})->name('admin.home');

		//USER
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

		//MASAKAN
		Route::prefix('masakan')->group(function() {
			Route::get('/', 'MasakanController@daftar')->name('admin.masakan');
			Route::delete('/', 'MasakanController@delete')->middleware('level.admin');

			Route::get('/add', 'MasakanController@add')->name('admin.masakan.add')->middleware('level.admin');
			Route::post('/add', 'MasakanController@save')->middleware('level.admin');

			Route::get('/edit/{id}', 'MasakanController@edit')->name('admin.masakan.edit')->middleware('level.admin');
			Route::post('/edit/{id}', 'MasakanController@update')->middleware('level.admin');

				Route::prefix('kategori')->group(function() {
					Route::get('/', 'MasakanController@daftarKategori')->name('admin.masakan.kategori');
					Route::delete('/', 'MasakanController@deleteKategori')->middleware('level.admin');

					Route::get('/add', 'MasakanController@addKategori')->name('admin.masakan.kategori.add')->middleware('level.admin');
					Route::post('/add', 'MasakanController@saveKategori')->middleware('level.admin');

					Route::get('/edit/{id}', 'MasakanController@editKategori')->name('admin.masakan.kategori.edit')->middleware('level.admin');
					Route::post('/edit/{id}', 'MasakanController@updateKategori')->middleware('level.admin');
				});
		});

		//ORDER
		Route::prefix('order')->group(function() {
			Route::get('/', 'OrderController@data')->name('admin.order');
			Route::delete('/', 'OrderController@delete')->middleware('level.admin');

			Route::get('/add', 'OrderController@add')->name('admin.order.add')->middleware('level.admin');
			Route::post('/add', 'OrderController@save')->middleware('level.admin');

			Route::get('/edit/{id_order}', 'OrderController@edit')->name('admin.order.edit')->middleware('level.admin');
			Route::post('/edit/{id_order}', 'OrderController@update')->middleware('level.admin');

			//Detail Order
			Route::get('/detail/{id}', 'OrderController@detail')->name('admin.order.detail')->middleware('level.admin');
		});

		//Entri Order
		Route::prefix('entri')->group(function() {
			Route::get('/', 'OrderController@entri')->name('entri.order');
		});

		//Cashier
		Route::prefix('cashier')->middleware('level.admin:kasir')->group(function() {
			Route::get('/','TransaksiController@kasir')->name('cashier');
		});

		//TRANSAKSI
		Route::prefix('transaksi')->group(function() {
			Route::get('/', 'TransaksiController@index')->name('admin.transaksi');
			Route::delete('/', 'TransaksiController@delete')->middleware('level.admin');
		});

	});
});
