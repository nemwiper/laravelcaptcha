<audio id="captchasound" src="{{route('lucbu.laravelcaptcha.sound',md5(date('dmyhis')))}}" preload="auto"></audio>
<img id="captchaimage" src="{{ route('lucbu.laravelcaptcha.image', md5(date('dmyhis'))) }}" width="" height=""  style="display:inline-block;"/>
