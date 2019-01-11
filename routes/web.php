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

Route::get('/languages', 'LanguageController@index');




Route::resource('/vocs', 'VocabularyController');

Route::get('/api/v1/vocs', 'VocabularyController@apiVocList');

Route::get('/api/v1/languages', 'VocabularyController@apiLangList');

Route::get('/api/v1/vocs/{lid1}/{lid2}', 'VocabularyController@apiLangVocList');

Route::get('/api/v1/vocs', 'VocabularyController@apiVocList');

Route::get('/api/v1/fullvocs', 'VocabularyController@apiFullVocList');

Route::get('/api/v1/voc/{vid}', 'VocabularyController@apiVocabulary');

Route::get('/api/v1/assignments/{token}', 'AssignmentController@assignmentsFor');

Route::post('/api/v1/result', 'AssignmentController@assignmentResult');
