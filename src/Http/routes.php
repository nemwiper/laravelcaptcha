<?php

Route::group([
	'namespace' => 'Lucbu\LaravelCaptcha\Http\Controllers',
    'middleware' => ['web'],
	'prefix' => 'lucbu/laravelcaptcha',
	'controller' => 'CaptchaController'
], function () {
	Route::get('/image', ['as' => 'lucbu.laravelcaptcha.image', 'uses' => 'CaptchaController@captchaImage']);
	Route::get('/sound', ['as' => 'lucbu.laravelcaptcha.sound', 'uses' => 'CaptchaController@captchaSound']);
	Route::get('/update', ['as' => 'lucbu.laravelcaptcha.update', 'uses' => 'CaptchaController@captchaUpdate']);
});
