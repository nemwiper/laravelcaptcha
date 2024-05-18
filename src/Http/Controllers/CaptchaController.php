<?php

namespace Lucbu\LaravelCaptcha\Http\Controllers;

use App;
use Config;
use Session;
use Response;
use falahati\PHPMP3\MpegAudio;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Lucbu\LaravelCaptcha\Services\Captcha;

class CaptchaController extends Controller
{
    /**
     * Show captcha image
     *
     * @return Response
     */
    public function captchaImage()
    {
        $sessionKey = Config::get('lucbu-laravelcaptcha.sessionKey');
        if(!Session::has($sessionKey))
            Captcha::generateCaptcha();

        return View::make('lucbu-laravelcaptcha::imagecaptcha', [
                'captcha' => Session::get($sessionKey)
            ])->header('Content-Type', "image/png");
    }

    /**
     * Captcha sound
     *
     * @return Response
     */
    public function captchaSound()
    {
        $sessionKey = Config::get('lucbu-laravelcaptcha.sessionKey');
        if(!Session::has($sessionKey))
            Captcha::generateCaptcha();

        $captcha = strtolower(Session::get($sessionKey));
        $path = 'lucbu/laravelcaptcha/sounds/' . App::getLocale() . '/';
        if(!file_exists($path))
            $path = 'lucbu/laravelcaptcha/sounds/'.Config::get('lucbu-laravelcaptcha.default_language').'/';

        $audio = new MpegAudio();
        for($i = 0; $i < strlen($captcha); $i++)
            $audio->append(MpegAudio::fromFile($path . $captcha[$i] . '.mp3'));

        return View::make('lucbu-laravelcaptcha::soundcaptcha', [
                'captcha' => $audio->getFrameData(0)
            ])->header('Content-Type', "audio/mpeg");
    }

    /**
     * Update captcha
     *
     * @return Response
     */
    public function captchaUpdate()
    {
        Captcha::generateCaptcha();
        return View::make('lucbu-laravelcaptcha::media');
    }
}
