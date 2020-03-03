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
Route::post('/agent/regional', 'AgentController@chain_regional')->name('chain');
Route::post('/agent/witel', 'AgentController@chain_witel')->name('chain');
Route::post('/agent/paket', 'AgentController@chain_paket')->name('chain');
# Coiunting Agent Call
Route::post('/agent/activity', 'AgentController@countActivityAgent')->name('agent_activity');
# List view Consume
Route::get('/agent/consume/{param}', 'AgentController@consume')->name('agent_consume');
Route::get('/agent/unconsume', 'AgentController@unconsume')->name('agent_unconsume');
# JSON view data
Route::post('/agent/view', 'AgentController@viewDataStatistics');

# Bikir Route untuk QCO
Route::get('/qco', 'QCOController@index')->name('qco_workspace');
Route::get('/qco/workspace', 'QCOController@index')->name('qco_workspace');
Route::get('/qco/consume/{param}', 'QCOController@consume')->name('qco_consume');
Route::get('/qco/unconsume', 'QCOController@unconsume')->name('qco_unconsume');
# Retapping QCO
Route::get('/qco/retapping/{id}', 'QCOController@retapping')->name('qco_retapping');
# JSON view data
Route::post('/qco/view', 'QCOController@viewDataStatistics');
# Chaining Select 1
Route::post('/qco/status_tapping', 'QCOController@chain_tapping_call')->name('chain');
# Counting Agent Tapping
Route::post('/qco/activity', 'QCOController@countActivityAgent')->name('qco_activity');
# Agebt view dan save data call
Route::post('/qco/data', 'QCOController@getData');
Route::post('/qco/save', 'QCOController@saveDataTapping');

# Route untuk Admin
Route::get('/admin', 'AdminController@index')->name('admin_index');
// Page Reporting
Route::get('/admin/report', 'AdminController@report')->name('admin_report');
Route::get('/admin/get_dapros_data', 'AdminController@get_dapros_data');
Route::post('/admin/download_report', 'AdminController@download_report');
// Page Console
Route::get('/admin/console/users', 'AdminController@console_users')->name('admin_console');
Route::get('/admin/console/resources', 'AdminController@console_resources')->name('admin_console');
Route::get('/admin/console/data-consume/{id}', 'AdminController@console_data_consume')->name('admin_console');
// JSON List Resources, User dan Data ke Datatables
Route::get('/admin/console/get_status_call_list', 'AdminController@get_status_call_list')->name('admin_list_resources');
Route::get('/admin/console/get_detail_call_list', 'AdminController@get_detail_call_list')->name('admin_list_resources');
Route::get('/admin/console/get_detail_reason_list', 'AdminController@get_detail_reason_list')->name('admin_list_resources');
Route::get('/admin/console/get_status_tapping_list', 'AdminController@get_status_tapping_list')->name('admin_list_resources');
Route::get('/admin/console/get_users_list', 'AdminController@get_users_list')->name('admin_list_resources');
Route::get('/admin/console/get_witel_list', 'AdminController@get_witel_list')->name('admin_list_resources');
Route::get('/admin/console/get_skill_list', 'AdminController@get_skill_list')->name('admin_list_resources');
Route::get('/admin/console/get_paket_list', 'AdminController@get_paket_list')->name('admin_list_resources');
// Ambil informasi User by ID
Route::post('/admin/console/get_users_list', 'AdminController@get_users_list')->name('admin_get_user');
// JSON List All Resources ke Select2
Route::post('/admin/console/get_status_call_list_options', 'AdminController@list_all_options_status_call')->name('admin_list_option_resources');
Route::post('/admin/console/get_detail_call_list_options', 'AdminController@list_all_options_status_detail_call')->name('admin_list_option_resources');
Route::post('/admin/console/get_detail_reason_list_options', 'AdminController@list_all_options_status_detail_reason_call')->name('admin_list_option_resources');
Route::post('/admin/console/get_status_tapping_list_options', 'AdminController@list_all_options_tapping_status')->name('admin_list_option_resources');
Route::post('/admin/console/get_witel_list_options', 'AdminController@list_all_options_witel')->name('admin_list_option_resources');
Route::post('/admin/console/get_regional_list_options', 'AdminController@list_all_options_regional')->name('admin_list_option_resources');
Route::post('/admin/console/get_skill_list_options', 'AdminController@list_all_options_skill')->name('admin_list_option_resources');
Route::post('/admin/console/get_paket_list_options', 'AdminController@list_all_options_paket')->name('admin_list_option_resources');

//Route::post('/admin/console/get_role_list_options', 'AdminController@list_all_options_tapping_status')->name('admin_list_option_resources');
Route::post('/admin/console/get_role_list_options', function () {
	$datas = array( 
		['id'=>'Agent', 'value_role'=>'Agent'],
		['id'=>'QCO', 'value_role'=>'QCO'],
		['id'=>'Inputter', 'value_role'=>'Inputter']
	);
    return response()->json($datas);
})->name('admin_list_option_resources');
// Handle Submit Request dari COnsole
Route::post('/admin/console/save_status_call', 'AdminController@save_status_call')->name('admin_save_resources');
Route::post('/admin/console/save_status_detail_call', 'AdminController@save_status_detail_call')->name('admin_save_resources');
Route::post('/admin/console/save_status_detail_reason_call', 'AdminController@save_status_detail_reason_call')->name('admin_save_resources');
Route::post('/admin/console/save_tapping_status', 'AdminController@save_tapping_status')->name('admin_save_resources');
Route::post('/admin/console/save_regional', 'AdminController@save_regional')->name('admin_save_resources');
Route::post('/admin/console/save_witel', 'AdminController@save_witel')->name('admin_save_resources');
Route::post('/admin/console/save_skill', 'AdminController@save_skill')->name('admin_save_resources');
Route::post('/admin/console/save_paket', 'AdminController@save_paket')->name('admin_save_resources');
Route::post('/admin/console/save_user', 'AdminController@save_user')->name('admin_save_resources');
Route::post('/admin/console/import_users', 'AdminController@import_users')->name('admin_save_resources');
Route::post('/admin/console/import_dapros', 'AdminController@import_dapros')->name('admin_save_resources');
Route::post('/admin/console/update_data', 'AdminController@update_data_dapros_statistics')->name('admin_save_resources');