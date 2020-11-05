<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('homePage');

/*
* Vute HTTP Requests
*/
Route::get('/statistics', 'HomeController@statistics')->name('statistics');

Route::get("users/all", "UserController@index");
Route::get("user/profile", "UserController@profile");
Route::post("user/create", "UserController@create");
Route::post("user/edit", "UserController@edit");
Route::post("user/delete", "UserController@delete");


/*
* Handle When Click Route
*/
Route::get('{path}', 'HomeController@index')->where('path', '([A-z\d-\/_.]+)?');
