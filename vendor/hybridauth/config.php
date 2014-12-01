<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "http://contactame.cloudapp.net/vendor/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "1008560754652-3moijaqbgnvl9r4vee57lss6ortc1fha.apps.googleusercontent.com", "secret" => "_EGJlDJzOgLdY_gh64IxU-e0" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "633868283389514", "secret" => "5f955aca0ef85388afe19206d2ca2d58" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "ERlHHivlrGbvYhb0tZ3FmWe2k", "secret" => "PL1rBDEuuvuPDBcRNStCmB7AJjxFWIWeLZj9nzWdWps9hOATGd" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
