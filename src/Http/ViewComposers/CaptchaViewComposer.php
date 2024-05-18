<?php

namespace Lucbu\LaravelCaptcha\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Lucbu\LaravelCaptcha\Services\Captcha;

class CaptchaViewComposer
{
	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		Captcha::generateCaptcha();
	}
}