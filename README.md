# LaravelCaptcha

Working on **Laravel 5-8**. 
French, English, Spanish and Italian!!!

## Installation

Install with composer :
```
composer require nemwiper\laravelcaptcha
```

Just add in the array `providers` in the file `config\app.php`:
```php
'Lucbu\LaravelCaptcha\CaptchaServiceProvider',
``` 

If your Laravel version supports autodiscovery this step is not necessary

Publish the package using the command :
```
php artisan vendor:publish --provider="Lucbu\LaravelCaptcha\CaptchaServiceProvider"
```

## Configuration

In the file `config\lucbu-laravelcaptcha.php` there is some parameters that you can modify:
 * length: The length of the captcha (should be an integer)
 * listForbidden: list of letters that won't appear in captcha
 * icon-play: Path to icon image used to display the clicking button to hear the sounds of letters
 * icon-update: Path to icon image used to update the captcha
 * background-color: color of the captcha background (use red green blue notation ['red' => $red, 'green' => $green, 'blue' => $blue])
 * text-color: color of the captcha text (use red green blue notation)
 * grid: Is there a grid behind the letters?
 * space-grid: Space between the line of the grid
 * line: Is there random lines on the captcha?
 * filter-smooth: Apply smooth filter to captcha
 * filter-smooth-level: Level of filter
 * width: width of the captcha image;
 * height: height of the captcha image
 * width-html: width of the image displayed in the view in px
 * height-html: height of the image displayed in the view in px
 * sessionKey: the key used to store the captcha in Session Variable
 * default_language: the language in case we don't find the sounds for the locale

## Usage

In the form view, just use the following code :
```php
@include('lucbu-laravelcaptcha::captcha')
```
and add an input with name="captcha" for inserting the captcha.

You can validate the fields that has to be fulfill with captcha with the rule `lucbularavelcaptcha` :
```php
public function rules() {
    return [
        'captcha' => 'required|lucbularavelcaptcha:is_caseSensitive'
    ];
}
```
You can set the parameters is_caseSensitive as 'true' or 'false', the validation will take care or not of matching the case (false by default).

You can generate a captcha in a controller like this :
```php
<?php namespace App\Http\Controllers;

use Lucbu\LaravelCaptcha\Services\Captcha;

class ExampleController {
    public function exampleFunction(){
        Captcha::generateCaptcha();
    }
}
```

The function will create the captcha and store into the session variable.

You can also get just the image using the route `lucbu.laravelcaptcha.image` or the sound with the route `lucbu.laravelcaptcha.sound`.

The player used to play the sound is based on HTML5. (`<audio>` tag)

## Collaborators
[@Nembie](https://github.com/Nembie)