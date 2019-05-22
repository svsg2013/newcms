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
    return redirect()->route('indexversionone');
})->name('homepage');

Route::get('/test', 'IndexController@test')->name('test');

Route::get('/1', 'IndexController@indexversionone')->name('indexversionone');
Route::get('/2', 'IndexController@indexversiontwo')->name('indexversiontwo');
Route::get('/3', 'IndexController@indexversionthree')->name('indexversionthree');
Route::get('/4', 'IndexController@indexversionfour')->name('indexversionfour');
Route::get('/dang-ky-thanh-cong', 'IndexController@thankyou')->name('indexthankyou');
Route::get('/khong-dang-ky', 'IndexController@failed')->name('indexfailed');
Route::post('/version-1/action', 'AjaxController@versiononeCreate')->name('actionversionone');
Route::post('/version-2/action', 'AjaxController@versiontwoCreate')->name('actionversiontwo');
Route::post('/version-3/action', 'AjaxController@versionthreeCreate')->name('actionversionthree');
Route::post('/version-4/action', 'AjaxController@versionfourCreate')->name('actionversionfour');
Route::get('/ajax/careers.html', 'AjaxController@career')->name('ajax.careers');
Route::get('/ajax/loan.html', 'AjaxController@loan')->name('ajax.loan');