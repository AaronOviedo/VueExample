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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/donator', 'DonacionController@register');
Route::post('/donate', 'DonacionController@donate');
Route::get('/donator', 'DonacionController@index');
Route::get('/donators', 'DonacionController@getDonators');
Route::get('/benefactors', 'DonacionController@getBenefactors');
Route::get('/myDonations', 'DonacionController@myDonations');
Route::get('/donations', 'DonacionController@myDonationsPage');
