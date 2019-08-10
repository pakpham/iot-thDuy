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
	if(!Auth::check()){
		return view('admin.login');
	} else{
		return redirect()->route('home-admin');
	}
	
});
// Route::get('/home', 'pakController@getHome');
// Route::get('/get-test', 'pakController@getTest');
// Route::get('/table-ss1', 'TableSensor@getSs1');
// Route::get('/table-ss2', 'TableSensor@getSs2');
// Route::get('/table-ss3', 'TableSensor@getSs3');
// Route::get('/table-ss4', 'TableSensor@getSs4');

// Route::get('/chart-1', function(){
// 	return view ('pages.chart-1');
// });
Route::get('/test/', 'pakController@getTest');
Route::post ('get-data-home', 'pakController@getDataHome')->name('get-data-home');
Route::post('post-test', 'pakController@addDataSensor')->name('post-test');
Route::get('add-user/{name}/{pass}', 'pakController@addUser');
Route::get('add-data/{name}/{data}', 'pakController@addData');



/////////////////////////////////////////////////////////////////////////
Route::get('testpub/{topic}/{message}','mqttController@testPub');

Route::get('testsub/{topic}','mqttController@testSub');

// DANG NHAP NGUOI DUNG  +++ Auth  +++
Route::get('dangnhap', function(){
	if(!Auth::check()){
		return view('admin.login');
	}
	else echo "Ban da dang nhap. ";
});

Route::post('login','User@handlingLogin')->name('login');
//////////////////////////////////////////////////////////////


// PHAN QUYEN TRUY CAP
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	Route::get('dangxuat', 'User@logout')->name('logout');
	Route::get('/home', 'pakController@getHome')->name('home-admin');
	Route::get('/get-test', 'pakController@getTest');
	Route::get('/table-ss1', 'TableSensor@getSs1');
	Route::get('/table-ss2', 'TableSensor@getSs2');
	Route::get('/table-ss3', 'TableSensor@getSs3');
	Route::get('/table-ss4', 'TableSensor@getSs4');
	Route::post('get-chart', 'TableSensor@getData')->name('get-data-chart');


	Route::get('/chart-1', function(){
		return view ('pages.chart-1');
	});

	Route::get('test', function(){
		return view ('pages.test1');
	});

});

Route::group(['prefix'=>'ajax'], function(){
	Route::post('getloaitin','ajaxController@getLoaitin')->name('getloaitin');
});

