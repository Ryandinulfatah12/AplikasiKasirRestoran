<?php

// Tampilkan Halaman Login di Awal
Route::get('/', function() {
	return view('auth.login');
});



Route::group(['prefix' => 'frontend','middleware'=>['auth']], function() {
	Route::get('/', function() {
		return redirect('/frontend/menu');
	})->name('admin.home');
	
	//tampilkan menu masakan (database)
	Route::get('/menu', 'FrontEndController@menu')->name('menu-masakan');
	//tampilkan menurut kategori
	Route::get('/kategori/{id}','FrontEndController@menu')->name('show.category');

	//menambahkan item ke cart menggunakan session
	Route::get('/cart/{id}','FrontEndController@AddToCart')->name('add.cart');

	//fungsi show,menambah,menghapus item session yang ada pada cart
	Route::get('/show/{id}','FrontEndController@showItem')->name('show.item');
	Route::get('/add{id}', 'FrontEndController@getAddOne')->name('addone');
	Route::get('/reduce{id}', 'FrontEndController@getReduceByOne')->name('reducebyone');
	Route::get('/remove{id}', 'FrontEndController@getRemoveItem')->name('remove.items');
	Route::get('cancel','FrontEndController@destroy')->name('cancel');

	//view cart
	Route::get('/shopping-cart','FrontEndController@getCart')->name('shopping.cart');

	//view checkout untuk verifikasi tagihan
	Route::get('/checkout','FrontEndController@getCheckout')->name('checkout');
	//kirim data ke tabel detail order
	Route::post('/checkout', 'FrontEndController@postCheckout')->name('postcheckout');

	//Ucapan Terimakasih
	Route::get('/thanks','FrontEndController@thanks')->name('thankyou');
});

Route::group(['prefix'=>'admin','middleware'=>['auth']], function() {
	Route::get('/', function() {
		return view('admin.pages.dashboard');
	})->name('admin.home');

	//USER Route
	Route::prefix('user')->group(function() {
		Route::get('/', 'UserController@daftar')->name('admin.user')->middleware('level.admin');
		Route::delete('/', 'UserController@delete')->middleware('level.admin');

		//Route::get('/add', 'UserController@add');
		Route::post('/add', 'UserController@save')->middleware('level.admin')->name('admin.user.add');

		Route::get('/edit/{id}', 'UserController@edit')->name('admin.user.edit')->middleware('level.admin');
		Route::post('/edit/{id}', 'UserController@update')->middleware('level.admin');

		Route::get('/setting','UserSettingController@form')->name('admin.user.setting');
		Route::post('/setting', 'UserSettingController@update');
	});
	// End User

	// Masakan Route
	Route::group(['prefix'=>'masakan','middleware'=>'level.admin'], function()
	{
		Route::get('/', 'MasakanController@daftar')->name('admin.masakan');
		Route::delete('/', 'MasakanController@delete');

		//Route::get('/add', 'MasakanController@add');
		Route::post('/add', 'MasakanController@save')->name('admin.masakan.add');

		Route::get('/edit/{id}', 'MasakanController@edit')->name('admin.masakan.edit');
		Route::post('/edit/{id}', 'MasakanController@update');
	});
	// End MAsakan

	// Kategori Route
	Route::group(['prefix'=>'kategori','middleware'=>'level.admin'], function()
	{
		Route::get('/', 'MasakanController@daftarKategori')->name('admin.masakan.kategori');
		Route::delete('/', 'MasakanController@deleteKategori');

		//add
		Route::post('/add', 'MasakanController@saveKategori')->name('add.kategori');

		Route::get('/edit/{id}', 'MasakanController@editKategori')->name('admin.masakan.kategori.edit');
		Route::post('/edit/{id}', 'MasakanController@updateKategori');
	});
	// End KAtegori

	//Entri Order rOUTE
	Route::group(['prefix'=>'entri','middleware'=>'level.admin'], function()
	{
		Route::get('/', 'OrderController@entri')->name('entri.order');
		Route::get('/detail/{id_order}','OrderController@edit')->name('entri.detail');
	});
	// End Entri Order

	//Cashier Route
	Route::group(['prefix'=>'cashier','middleware'=>'level.admin:kasir'], function()
	{
		Route::get('/','TransaksiController@kasir')->name('cashier');
		Route::get('/payment/{id_order}','TransaksiController@payment')->name('payment');
	});
	// End Cashier

	// Transaksi Route
	Route::group(['prefix'=>'transaksi','middleware'=>'level.admin'], function()
	{
		Route::get('/', 'TransaksiController@index')->name('admin.transaksi');
		Route::delete('/', 'TransaksiController@delete');
	});
	// End Transaksi

	// Oredr Route
	Route::group(['prefix'=>'order','middleware'=>'level.admin'], function()
	{
		Route::get('/', 'OrderController@data')->name('admin.order');
		Route::delete('/', 'OrderController@delete');

		Route::get('/add', 'OrderController@add')->name('admin.order.add');
		Route::post('/add', 'OrderController@save');

		Route::get('/edit/{id_order}', 'OrderController@edit')->name('admin.order.edit');
		Route::post('/edit/{id_order}', 'OrderController@update');
	});
	// End Order

});

Auth::routes();

Route::any('register', function() {
	return abort(404);
});
