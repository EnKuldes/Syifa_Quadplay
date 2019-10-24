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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index')->name('home');

// Auth Routes dimatikan
// Auth::routes();
Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
  'confirm' => false, // Password Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

// Bikin Route tapi dari Resources
//Route::resource('agents', 'AgentController');
Route::get('/agent', 'AgentController@index')->name('workspace');
Route::get('/agent/workspace', 'AgentController@index')->name('workspace');
Route::post('/agent/data', 'AgentController@getData');