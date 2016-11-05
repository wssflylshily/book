<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Entity\Member;
Route::get('/', function () {
    return view('login');
});

Route::get('/login', 'View\MemberCodeController@toLogin');

Route::get('/register', 'View\MemberCodeController@toRegister');
Route::get('/category', 'View\BookController@toCategory');


Route::group(['prefix' => 'service'], function () {
    Route::any('validate_code/create','Service\ValidateCodeController@create');
    Route::any('validate_code/send','Service\ValidateCodeController@sendSMS');
    Route::any('validate_code/validateEmail','Service\ValidateCodeController@validateEmail');
    Route::any('register','Service\MemberCodeController@register');
    Route::any('login','Service\MemberCodeController@login');
    Route::any('category/parent_id/{parent_id}','Service\BookController@toCategory');
    Route::any('sendEmailReminder','Service\MemberCodeController@sendEmailReminder');
});
