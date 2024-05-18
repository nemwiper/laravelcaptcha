<?php

namespace Lucbu\LaravelCaptcha\Services;

use Config;
use Session;
use Illuminate\Support\Str;

class Captcha
{
    /**
     * Generate captcha
     *
     * @return string
     */
    public static function generateCaptcha()
    {
        $length = Config::get('lucbu-laravelcaptcha.length');
		$listForbidden = Config::get('lucbu-laravelcaptcha.listForbidden');

		do {
            $captcha = Str::random($length);

			$goodCaptcha = true;
			foreach($listForbidden as $c){
				$goodCaptcha = $goodCaptcha && (!strpos($captcha, $c));
			}
        } while (!$goodCaptcha);

        $sessionKey = Config::get('lucbu-laravelcaptcha.sessionKey');
        Session::put($sessionKey, $captcha);
        return $captcha;
    }
}
