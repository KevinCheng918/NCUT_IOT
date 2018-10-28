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

Auth::routes();

Route::get('home', 'ChannelController@select')->name('home');

Route::get('Channels/{id?}', 'ChannelController@select')->name('Channels');

Route::get('Channels/{id}/Chart/{chart_num}','ChannelController@displayChart')->name('Chart');

Route::get('Update','ChannelController@insertChartData')->name('insert');

Route::get('Channels/{id}/DataCount/{chart_num}','ChannelController@DataCount')->name('DataCount');
Route::get('Channels/{id}/Data/{chart_num}','ChannelController@findChartData')->name('Data');





Route::post('Channels/CreateChannel', 'ChannelController@CreateChannel')->name('CreChannel');
Route::post('Channel/EditChannel','ChannelController@EditChannel')->name('EdtChannel');
Route::post('Channel/EditChart','ChannelController@EditChart')->name('EdtChart');

