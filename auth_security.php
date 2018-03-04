<?php
$my_area = "Online PHP-tester";

//SETUP for user-account(s) using "username" => password_hash("your_password",PASSWORD_DEFAULT)
//default user-data is "admin" and "1234abcd"
//to generate a new hash from the web just call auth_security.php?generate_password=your_password
$login_data = array("admin" => '$2y$10$cwbYWmbgm6XRiHACioKwQ.NcWsnAtnb0lo2EqJz/qlMm9ClqTIYOC');

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="' . $my_area . '"');
	auth_fail();
} 
else {
	if(!isset($login_data[$_SERVER['PHP_AUTH_USER']])) {
		auth_fail();
	}
    if(!password_verify($_SERVER['PHP_AUTH_PW'],$login_data[$_SERVER['PHP_AUTH_USER']])) {
		auth_fail();
    }
	if(isset($_GET["generate_password"])) {
		exit(password_hash($_GET["generate_password"],PASSWORD_DEFAULT));
	}
}
function auth_fail() {	
	header('HTTP/1.0 401 Unauthorized');
	echo 'Authentification failed.';
	exit;
}
?>
