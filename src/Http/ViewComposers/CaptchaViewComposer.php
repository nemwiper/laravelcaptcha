<?php namespace Lucbu\LaravelCaptcha\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Lucbu\LaravelCaptcha\Services\Captcha;

class CaptchaViewComposer {

	public function compose(View $view) {
		Captcha::generateCaptcha();
	}
}