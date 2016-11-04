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


Route::any('service/validate_code/create','Service\ValidateCodeController@create');
Route::any('service/validate_code/send','Service\ValidateCodeController@sendSMS');
Route::any('service/validate_code/validateEmail','Service\ValidateCodeController@validateEmail');
Route::any('service/register','Service\MemberCodeController@register');
Route::any('service/sendEmailReminder','Service\MemberCodeController@sendEmailReminder');