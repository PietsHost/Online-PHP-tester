<?php
$my_area = "Online PHP-tester";

//SETUP for user-account(s) "username" => "password"
$login_data = array("admin" => "1234abcd");


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="' . $my_area . '"');
	auth_fail();
} 
else {
	if(!isset($login_data[$_SERVER['PHP_AUTH_USER']])) {
		auth_fail();
	}
    if($login_data[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW']) {
		auth_fail();
    }
}
function auth_fail() {	
	header('HTTP/1.0 401 Unauthorized');
	echo 'Authentification failed.';
	exit;
}
?>
