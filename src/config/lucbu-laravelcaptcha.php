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
	'background-color' => ['red' => 255, 'green' => 0, 'blue' => 255],

	//color of the captcha text (use red green blue notation)
	'text-color' => ['red' => 0, 'green' => 0, 'blue' => 255],

	//Is there a grid behind the letters?
	'grid' => true,

	//Is there random line on the captcha?
	'line' => false,

	'width' => 60,
	'height' => 20,

	'sessionKey' => 'lucbularavelcaptcha',

	'default_language' => 'en',
];
