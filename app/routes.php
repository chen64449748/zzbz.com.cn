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
Route::get('login', array('as'=> 'login', 'uses'=> 'LoginController@login'));
Route::post('doLogin', array('as'=> 'doLogin', 'uses'=> 'LoginController@doLogin'));

Route::get('register', array('as'=> 'register', 'uses'=> 'LoginController@register'));
Route::post('doRegister', array('as'=> 'doRegister', 'uses'=> 'LoginController@doRegister'));
Route::group(array('before'=> 'login'), function() {
	Route::get('/outLogin', array('as'=> 'outLogin', 'uses'=>'LoginController@outLogin'));
	// 首页
	Route::get('/', array('as'=> '/', 'uses'=> 'IndexController@index'));
	Route::get('/addWork', array('as'=> '/addWork', 'uses'=> 'IndexController@addWork'));
	//添加流水
	Route::post('/doAddWork', array('as'=> '/doAddWork', 'uses'=> 'IndexController@doAddWork'));
	// 流水详情
	Route::get('/workDetail', array('as' => 'workDetail', 'uses'=> 'IndexController@workDetail' ));
	// 添加登记
	Route::post('/addWorkProcess', array('as'=> 'addWorkProcess', 'uses'=> 'IndexController@addWorkProcess'));

	// 设置工序
	Route::get('/process', array('as'=> 'process', 'uses'=> 'ProcessController@process'));
	Route::get('/setProcess', array('as'=> 'setProcess', 'uses'=> 'ProcessController@setProcess'));
	Route::get('/addProcess', array('as'=> 'addProcess', 'uses'=> 'ProcessController@addProcess'));
	Route::post('/doAddProcess', array('as'=> 'doAddProcess', 'uses'=> 'ProcessController@doAddProcess'));

});

