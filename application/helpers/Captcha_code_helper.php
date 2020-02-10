<?php 


// this method  create necessary array to Captcha. 
function cap_code()
{
	$vals = array(
        'img_path'      => './assets/captcha_folder/',
        'img_url'       => base_url('assets/captcha_folder/'),
        'font_path'     => './assets/fonts/Dephiana',
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 10,
        'word_length'   => 5,
        'font_size'     => 18,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
        		)
		);

	return $vals;
}

