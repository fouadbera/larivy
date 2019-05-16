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

 Route::get('/fouad', function () {
     return 'welcome from larivy';
 });
route::get('/facebook','FacebookController@verify')->middleware('verifybot');
route::post('/facebook','FacebookController@verify');
Route::get('/{any}', 'singlePageController@index')->where('any', '.*');
