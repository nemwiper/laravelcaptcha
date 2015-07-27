<?php namespace Lucbu\LaravelCaptcha\Services;

use Illuminate\Support\Str;
use Session;
use Config;

class Captcha {

    public static function generateCaptcha(){
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
