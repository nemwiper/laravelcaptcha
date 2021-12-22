<div style="display:inline-block">
    <img src="{{ asset(Config::get('lucbu-laravelcaptcha.icon-play')) }}" alt="Play" height="12px" style="display:inline-block;cursor:pointer;" onclick="document.getElementById('captchasound').play();"/>
    <img src="{{ asset(Config::get('lucbu-laravelcaptcha.icon-update')) }}" alt="Update" height="12px" style="cursor:pointer;" onclick="captchaActualise();"/>
</div>

<div id="captchamedia" style="display:inline-block;">
    @include('lucbu-laravelcaptcha::media')
</div>

<script type="text/javascript">
function captchaActualise()
{
    var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("captchamedia").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","{{route('lucbu.laravelcaptcha.update')}}",true);
    xmlhttp.send();
}
</script>
