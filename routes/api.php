<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auths/login', 'authAPIController@login');
Route::post('auths/register', 'authAPIController@register');
Route::post('auths/update_email', 'authAPIController@update_email')->middleware('checkToken');
Route::post('auths/set_contact_info', 'authAPIController@setContactInfo')->middleware('checkToken');

Route::post('get_quiz_list', 'quizAPIController@getQuizList')->middleware('checkToken');
Route::post('get_questions', 'quizAPIController@getQuestions')->middleware('checkToken');
Route::post('get_history_list', 'quizAPIController@getHistoryList')->middleware('checkToken');
Route::post('get_history_detail', 'quizAPIController@getHistoryDetail')->middleware('checkToken');

Route::post('set_result', 'quizAPIController@setResult')->middleware('checkToken');
Route::post('set_question', 'quizAPIController@setQuestion')->middleware('checkToken');
