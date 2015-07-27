<?php

return [
	'length' => 6,

	//Letters that wont appear in any captcha
	'listForbidden' => ['0'],

	//Icon use to display the clicking button to hear the sounds of letters
	'icon-play' => '/lucbu/laravelcaptcha/pictures/sound-icon.png',

	//Icon use to display the clicking button to hear the sounds of letters
	'icon-update' => '/lucbu/laravelcaptcha/pictures/update-icon.png',

	//color of the captcha background (use red green blue notation)
	'background-color' => ['red' => 239, 'green' => 228, 'blue' => 176],

	//color of the captcha text (use red green blue notation)
	'text-color' => ['red' => 0, 'green' => 0, 'blue' => 255],

	//Is there a grid behind the letters?
	'grid' => true,
	
	//Space between line
	'space-grid' => 7,

	//Is there random line on the captcha?
	'line' => false,
	
	//Apply smooth filter to captcha
	'filter-smooth' => true,
	
	//Level of filter
	'filter-smooth-level' => 20,

	//Size of the image captcha in px
	'width' => 60,
	'height' => 20,
	
	//Size of the image displayed in the view in px
	'width-html' => 100,
	'height-html' => 30,

	'sessionKey' => 'lucbularavelcaptcha',

	'default_language' => 'en',
];
