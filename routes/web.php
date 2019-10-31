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

# Auth Routes dimatikan
// Auth::routes();
Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
  'confirm' => false, // Password Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

# Bikin Route tapi dari Resources
//Route::resource('agents', 'AgentController');
Route::get('/agent', 'AgentController@index')->name('agent_workspace');
Route::get('/agent/workspace', 'AgentController@index')->name('agent_workspace');
# Recall Agent
Route::get('/agent/workspace/recall/{id}', 'AgentController@recall')->name('agent_recall');
# Agebt view dan save data call
Route::post('/agent/data', 'AgentController@getData');
Route::post('/agent/save', 'AgentController@saveDataCall');
# Chaining Select 1
Route::post('/agent/status_call', 'AgentController@chain_status_call')->name('chain');
Route::post('/agent/status_detail_call', 'AgentController@chain_status_detail_call')->name('chain');
Route::post('/agent/status_detail_reason_call', 'AgentController@chain_status_detail_reason_call')->name('chain');
# Coiunting Agent Call
Route::post('/agent/activity', 'AgentController@countActivityAgent')->name('agent_activity');
# List view Consume
Route::get('/agent/consume/{param}', 'AgentController@consume')->name('agent_consume');
# JSON view data
Route::post('/agent/view', 'AgentController@viewDataStatistics');