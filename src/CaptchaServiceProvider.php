<?php

namespace Lucbu\LaravelCaptcha;

use View;
use Lang;
use Config;
use Session;
use Validator;
use Illuminate\Support\ServiceProvider;

class CaptchaServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//New rule validation on captcha
		Validator::extend('lucbularavelcaptcha', function($attribute, $value, $parameters) {
			$sessionKey = Config::get('lucbu-laravelcaptcha.sessionKey');
			
			// Check if parameters has "is_caseSensitive" value
			$case_sensitive = in_array('is_caseSensitive', $parameters);

			$captcha = Session::get($sessionKey);

            if(!$case_sensitive){
                return ($value == $captcha || $value == strtolower($captcha) || $value == strtoupper($captcha));
			}
            return $value == $captcha;
        });

		Validator::replacer('lucbularavelcaptcha', function($message, $attribute, $rule, $parameters) {
	        return Lang::get('lucbu-laravelcaptcha::validation.captcha');
	    });

		$this->loadViewsFrom(__DIR__ . '/resources/views', 'lucbu-laravelcaptcha');
		$this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'lucbu-laravelcaptcha');

		//Publish stuff needed
		$this->publishes([__DIR__ . '/config' => base_path('/config')]);
		$this->publishes([__DIR__ . '/sounds' => base_path('/public/lucbu/laravelcaptcha/sounds')]);
		$this->publishes([__DIR__ . '/pictures' => base_path('/public/lucbu/laravelcaptcha/pictures')]);

		include __DIR__ . '/Http/routes.php';

		//View compose ron the views captcha::captcha
		View::composer('lucbu-laravelcaptcha::captcha', 'Lucbu\LaravelCaptcha\Http\ViewComposers\CaptchaViewComposer');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->make('Lucbu\LaravelCaptcha\Http\Controllers\CaptchaController');
	}
}
