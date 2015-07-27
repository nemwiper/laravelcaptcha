<audio id="captchasound" src="{{route('lucbu.laravelcaptcha.sound',md5(date('dmyhis')))}}" preload="auto"></audio>
<img id="captchaimage" src="{{ route('lucbu.laravelcaptcha.image', md5(date('dmyhis'))) }}" width="{{Config::get('lucbu-laravel.width-html'}}" height="{{Config::get('lucbu-laravel.height-html'}}"  style="display:inline-block;"/>
