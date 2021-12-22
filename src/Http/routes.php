<?php
Route::group([
	'namespace' => 'Lucbu\LaravelCaptcha\Http\Controllers',
    'middleware' => ['web']
], function () {
	Route::get('lucbu/laravelcaptcha/image', ['as' => 'lucbu.laravelcaptcha.image', 'uses' => 'CaptchaController@captchaImage']);
	Route::get('lucbu/laravelcaptcha/sound', ['as' => 'lucbu.laravelcaptcha.sound', 'uses' => 'CaptchaController@captchaSound']);
	Route::get('lucbu/laravelcaptcha/update', ['as' => 'lucbu.laravelcaptcha.update', 'uses' => 'CaptchaController@captchaUpdate']);
});
