<?php namespace Lucbu\LaravelCaptcha\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Lucbu\LaravelCaptcha\Services\Captcha;
use Session;
use Response;
use Config;
use App;
use Log;
use falahati\PHPMP3\MpegAudio;

class CaptchaController extends Controller
{
    public function captchaImage(){
        $sessionKey = Config::get('lucbu-laravelcaptcha.sessionKey');
        if(!Session::has($sessionKey)){
            Captcha::generateCaptcha();
        }

        $captcha = Session::get($sessionKey);
        return Response::view('lucbu-laravelcaptcha::imagecaptcha', ['captcha' => $captcha])->header('Content-Type', "image/png");
    }

    public function captchaSound(){
        $sessionKey = Config::get('lucbu-laravelcaptcha.sessionKey');
        if(!Session::has($sessionKey)){
            Captcha::generateCaptcha();
        }

        $captcha = strtolower(Session::get($sessionKey));
        $lang = App::getLocale();
        $path = 'lucbu/laravelcaptcha/sounds/'.$lang.'/';
        if(!file_exists($path))
            $path = 'lucbu/laravelcaptcha/sounds/'.Config::get('lucbu-laravelcaptcha.default_language').'/';

        $audio = new MpegAudio();
        for($i = 0; $i < strlen($captcha); $i++){
            $c = $captcha[$i];
            $audio->append(MpegAudio::fromFile($path . $c . '.mp3'));
        }

        return Response::view('lucbu-laravelcaptcha::soundcaptcha', ['captcha' => $audio->getFrameData(0)])->header('Content-Type', "audio/mpeg");
    }

    public function captchaUpdate(){
        Captcha::generateCaptcha();
        return Response::view('lucbu-laravelcaptcha::media');
    }
}
