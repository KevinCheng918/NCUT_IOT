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

Route::get('home', 'HomeController@index')->name('home');

Route::get('Channels/{id?}', 'ChannelController@select')->name('Channels');

Route::get('Channels/{channel_id}/Chart/{chart_num}','ChannelController@displayChart')->name('Chart');


Route::get('Channels/{channel_id}/DataCount/{chart_num}','ChannelController@DataCount')->name('DataCount');
Route::get('Channels/{channel_id}/Data/{chart_num}','ChannelController@findChartData')->name('Data');



Route::get('Update','ChannelController@insertChartData')->name('insert');


Route::post('Channels/CreateChannel', 'ChannelController@CreateChannel')->name('CreChannel');
Route::post('Channel/EditChannel','ChannelController@EditChannel')->name('EdtChannel');

