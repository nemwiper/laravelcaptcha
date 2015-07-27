<audio id="captchasound" src="{{route('lucbu.laravelcaptcha.sound',md5(date('dmyhis')))}}" preload="auto"></audio>
<img id="captchaimage" src="{{ route('lucbu.laravelcaptcha.image', md5(date('dmyhis'))) }}" width="{{Config::get('lucbu-laravelcaptcha.width-html')}}px" height="{{Config::get('lucbu-laravelcaptcha.height-html')}}px"  style="display:inline-block;"/>
