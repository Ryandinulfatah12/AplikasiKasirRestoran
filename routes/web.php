<?php

// Tampilkan Halaman Login di Awal
Route::get('/', function() {
	return view('auth.login');
});

// FRONTEND ROUTING
Route::group(['prefix' => 'frontend','middleware'=>['auth']], function() {
	Route::get('/', function() {
		return redirect('/frontend/menu');
	})->name('admin.home');
	
	//tampilkan menu masakan (database)
	Route::get('/menu', 'FrontEndController@menu')->name('menu-masakan');
	//tampilkan menurut kategori
	Route::get('/kategori/{nama_kategori}','FrontEndController@showCategory')->name('show.category');

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
	// View History Order
	Route::get('/history', 'FrontEndController@history')->name('history');

	//view checkout untuk verifikasi tagihan
	Route::get('/checkout','FrontEndController@getCheckout')->name('checkout');
	//kirim data ke tabel detail order
	Route::post('/checkout', 'FrontEndController@postCheckout')->name('postcheckout');

	//Ucapan Terimakasih
	Route::get('/thanks','FrontEndController@thanks')->name('thankyou');
});
// ENDFRONTEND ROUTING

// BACKEND ROUTING
Route::group(['prefix'=>'admin','middleware'=>['auth']], function() {
	Route::get('/', function() {
		$orders = App\Order::where('status_order','Beres')->get();
		$transaksi = App\Transaksi::all();

		//SIAPKAN DATA CHART ORDER
		$orderchart = [];
		foreach($orders as $ochart) {
			$orderchart[] = $ochart->count();
		}
		return view('admin.pages.dashboard', compact('orderchart'));
	})->name('admin.home')->middleware('level.admin:owner');

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

		//export ke EXcel
		Route::get('/export', 'UserController@exportExcel')->name('user.export.excel');
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
	Route::group(['prefix'=>'entri','middleware'=>'level.admin:waiter'], function()
	{
		Route::get('/', 'OrderController@entri')->name('entri.order');
		Route::get('/accept/{id_order}','OrderController@terimaEntri')->name('entri.accept');
	});
	// End Entri Order

	//Cashier Route
	Route::group(['prefix'=>'cashier','middleware'=>'level.admin:kasir'], function()
	{
		Route::get('/','TransaksiController@kasir')->name('cashier');
		Route::get('/payment/{id_order}','TransaksiController@payment')->name('payment');
		Route::post('/payment','TransaksiController@bayar')->name('bayar');
		Route::get('/finish/{id_order}','TransaksiController@getFinish')->name('getFinish');
	});
	// End Cashier

	// Transaksi Route
	Route::group(['prefix'=>'transaksi','middleware'=>'level.admin:kasir:waiter'], function()
	{
		Route::get('/', 'TransaksiController@index')->name('admin.transaksi');
		Route::delete('/', 'TransaksiController@delete');
	});
	// End Transaksi

	// Oredr Route
	Route::group(['prefix'=>'order','middleware'=>'level.admin:kasir:waiter'], function()
	{
		Route::get('/', 'OrderController@data')->name('admin.order');
		Route::delete('/', 'OrderController@delete');

		Route::get('/add', 'OrderController@add')->name('admin.order.add');
		Route::post('/add', 'OrderController@save');

		Route::get('/edit/{id_order}', 'OrderController@edit')->name('admin.order.edit');
		Route::post('/edit/{id_order}', 'OrderController@update');
	});
	// End Order

	// Start Report
	Route::prefix('/report')->group(function() {
		Route::get('/invoice/{kode_order}','reportController@invoice')->name('invoice');
		Route::get('/delivery/{kode_order}', 'reportController@delivery')->name('delivery');
		Route::group(['middleware' => 'level.admin'], function() {
			Route::get('/','reportController@buat')->name('report');
			Route::post('/','reportController@render')->name('report.render');
		});
	});
	// End Report

});
// ENDBACKEND ROUTING

Auth::routes();

Route::any('register', function() {
	return abort(404);
});
