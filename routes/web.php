<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('/api_check/auth_login', 'APIcheckController@auth_login')
	->name('api_check.auth_login');

Route::get('/api_check/auth_register', 'APIcheckController@auth_register')
	->name('api_check.auth_register');

Route::get('/api_check/update_email', 'APIcheckController@update_email')
	->name('api_check.update_email');

Route::get('/api_check/set_contact_info', 'APIcheckController@set_contact_info')
	->name('api_check.set_contact_info');
	
Route::get('/api_check/get_quiz_list', 'APIcheckController@get_quiz_list')
	->name('api_check.get_quiz_list');
	
Route::get('/api_check/get_quiz_questions', 'APIcheckController@get_quiz_questions')
	->name('api_check.get_quiz_questions');

Route::get('/api_check/get_history_list', 'APIcheckController@get_history_list')
	->name('api_check.get_history_list');

Route::get('/api_check/get_history_detail', 'APIcheckController@get_history_detail')
	->name('api_check.get_history_detail');

Route::get('/api_check/set_result', 'APIcheckController@set_result')
	->name('api_check.set_result');

Route::get('/api_check/set_question', 'APIcheckController@set_question')
	->name('api_check.set_question');
