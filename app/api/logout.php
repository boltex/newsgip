<?php
require('_includes/sgipdata.php');
//require("_includes/functions.php");
session_cache_expire(60);
session_start();
$_SESSION = array(); // LE GARS A CLIQUER LOGOUT !!! BABYE !
session_destroy();

$data 		= array(); 		// array to pass back data

$data['success'] = true;
$data['message'] = 'Logged out';

// return all our data to an AJAX call
echo json_encode($data);

?>
